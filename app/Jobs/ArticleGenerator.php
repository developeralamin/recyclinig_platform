<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use App\Models\InfoArticle;
use App\Models\User;
use Exception;
use Google\Service\YouTube;
use Illuminate\Bus\Queueable;
use OpenAI\Laravel\Facades\OpenAI;
use Google\Client as Google_Client;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class ArticleGenerator implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $keywords;
    private $image;
    private $status;
    private $youtube_video;
    private $article_type;
    private $format;
    private $has_faq;
    private $id;
    private $items = [];
    /**
     * Create a new job instance.
     */
    public function __construct(array $data, int $id)
    {
        $this->keywords        = $data['keywords'];
        $this->image           = $data['has_image'];
        $this->status          = $data['wp_status'];
        $this->youtube_video   = $data['has_youtube_video'];
        $this->article_type    = $data['article_type'];
        $this->format          = $data['format'];
        $this->has_faq         = $data['has_faq'];
        $this->id              = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $article = InfoArticle::find($this->id);
        $article->status = "processing";
        $article->save();

        $article->full_article = $this->generalCreatArticle();
        $article->feature_image = $this->items['feature_image'];
        $article->status = "done";
        $article->length = str_word_count($article->full_article);
        $article->save();

        // Decrease user balance
        $user = User::find($article->user_id);
        $user->balance = ($user->balance - $article->length);
        Log::info('Balance: ' . $user->balance . ' Length: ' . $article->length);
        $user->save();

        try {
            $article->is_published = $this->sendToWordPress($article);
            $article->save();
        } catch (\Exception $e) {
            $article->is_published = false;
            $article->errors = $e->getMessage();
            $article->save();
        }
    }

    /**
     * Request to getTopics
     *
     * @param string $prompt
     */
    public function getTopics()
    {
        $length = $this->getNumSection();
        $prompt = sprintf('Expand the blog title into ' . $length . ' high-level blog sections excluding the introduction and conclusion: "%s"', $this->keywords);
        $result = $this->requestToOpenAi($prompt);
        $new_text = trim(nl2br($result['choices'][0]['text']));
        $items = explode('<br />', $new_text);
        $topics = [];
        foreach ($items as $item) {
            $item = trim($item);
            if (!empty($item)) {
                $topics[] = $this->purseTopic($item);
            }
        }
        return $topics;
    }

    /**
     * Purse the topic to get the max length item
     *
     * @param string $prompt
     * @return string
     */
    public function purseTopic(string $topic)
    {
        $items = explode('.', $topic);
        $max_length = 0;
        $max_item = '';
        foreach ($items as $item) {
            $item = trim($item);
            if (strlen($item) > $max_length) {
                $max_length = strlen($item);
                $max_item = $item;
            }
        }
        return $max_item;
    }

    public function getNumSection()
    {
        if ($this->article_type == 'short') {
            return '5/6';
        } elseif ($this->article_type == 'medium') {
            return '6/8';
        } else {
            return '7/11';
        }
    }


    /**
     * Request to createFaq
     *
     * @param string $prompt
     */
    public function createFaqInArticle()
    {
        $number_of_faq = ($this->article_type == 'long') ? 5 : 3;
        $prompt = sprintf('Write ' . $number_of_faq . ' faq about: "%s"', $this->keywords);
        $result = $this->requestToOpenAi($prompt);
        $faq = '<h2>' . 'FAQs About the ' . $this->keywords . '</h2>';
        $faq .= '<p>' . nl2br(trim($result['choices'][0]['text'])) . '<p/>';

        return $faq;
    }

    /**
     * Request to createIntroduction
     *
     * @param string $introduction
     */

    public function createIntroduction()
    {
        $prompt = sprintf('Write introduction about: "%s"', $this->keywords);
        $result = $this->requestToOpenAi($prompt);
        $intro = nl2br(trim($result['choices'][0]['text']));
        $items = explode('<br />', $intro);
        $introduction = '';
        foreach ($items as $item) {
            $item = trim($item);
            if (!empty($item)) {
                $introduction .= '<p>' . $item . '</p>';
            }
        }
        return $introduction;
    }

    /**
     * Request to createcConclusion
     *
     * @param string $introduction
     */

    public function createcConclusion()
    {
        $prompt = sprintf('Write conclusion about: "%s"', $this->keywords);
        $result = $this->requestToOpenAi($prompt);
        $conculusion = '<h2> Conclusion </h2>';
        $conculusion .= '<p>' . nl2br(trim($result['choices'][0]['text'])) . '<p>';

        return $conculusion;
    }

    /**
     * GetSectionDetails for Open AI
     *
     * @param [type] $topic
     * @return void
     */
    public function getSectionDetails($topic)
    {
        $prompt = "Expand the blog section within 100 words in to a short professional, witty and clever explanation. Write the blog section informative style. Do not repeat phrases. The article should provide an in-depth analysis of the topic, incorporate relevant data, real-world examples, and expert opinions, and ensure that the content is engaging SEO friendly, informative, and optimized for search engines. The article should be 100% unique and plagiarism-free. Write the blog section following the main blog title.
        Main blog title is: : $this->keywords
        The blog section is: : $topic";
        $result = $this->requestToOpenAi($prompt);
        $content = trim(nl2br($result['choices'][0]['text']));

        $items = explode('<br />', $content);
        $details = '';
        foreach ($items as $item) {
            $item = trim($item);
            if (!empty($item)) {
                $details .= '<p>' . $item . '</p>';
            }
        }

        return $details;
    }

    /**
     * GetTopic & GetSectionDetails for Open AI
     *
     * @param [type] $topic
     * @return void
     */
    public function elabroteToGenerateArticle()
    {
        $topics = $this->getTopics();
        $middle = (int) (count($topics) / 2);
        $blog = "";
        foreach ($topics as $key => $topic) {
            $topicContent = $this->getSectionDetails($topic);
            if ($key == $middle && in_array($this->format, ['format1', 'format2'])) {
                $blog .= $this->items['image'];
            }
            $title = "<h2> $topic </h2>";
            $content = "<p> $topicContent </p>";
            $blog .= $title;
            $blog .= $content;
        }
        return $blog;
    }

    /**
     * Request to OpenAI API
     *
     * @param string $prompt
     */
    public function requestToOpenAi(string $prompt, int $max_tokens = 2000)
    {
        $result = OpenAI::completions()->create([
            "model" => "gpt-4",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => $max_tokens,
            'prompt' => $prompt,
        ]);

        return $result;
    }

    /**
     * Create Article GeneralArticleGenerate
     *
     */
    public function generalCreatArticle()
    {
        $this->items['faq'] = "";
        if ($this->has_faq == '1') {
            $this->items['faq'] = $this->createFaqInArticle();
        }
        $this->items['introduction'] = $this->createIntroduction();
        $this->items['conclusion'] = $this->createcConclusion();
        $this->items['image'] = "";
        $this->items['feature_image'] = "";
        $this->imageFromSerper();

        $this->items['description'] = $this->elabroteToGenerateArticle();
        $this->items['video'] = '';
        if ($this->youtube_video == 'youtube_video') {
            $this->items['video'] = $this->videoFromYoutube();
        }

        return $this->arrangeArticle($this->items);
    }

    /**
     *  ArrangeArticle
     *
     * @return $blog
     */
    public function arrangeArticle($items)
    {
        $formats = [
            'format1' => ['introduction', 'description', 'video', 'faq', 'conclusion'],
            'format2' => ['introduction', 'description', 'faq', 'video', 'conclusion'],
            'format3' => ['introduction', 'image', 'description', 'video', 'faq', 'conclusion'],
            'format4' => ['introduction', 'image', 'description', 'faq', 'video', 'conclusion'],
        ];
        $blog = "";
        foreach ($formats[$this->format] as $item) {
            $blog .= $items[$item];
        }
        return $blog;
    }


    /**
     * Creating Article uploadImage
     *
     */
    public function uploadImage($article)
    {
        if (empty($this->items['feature_image'])) {
            return null;
        }

        try {
            $url = trim($article->website->domain) . "/wp-json/wp/v2/media";
            // Set the headers for the POST request
            $username = $article->website->username;
            $password = $article->website->password;

            $file = file_get_contents($this->items['feature_image']);
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Disposition: form-data; filename="' . $this->items['feature_image'] . '"',
                'Authorization: Basic ' . base64_encode($username . ':' . $password),
            ]);
            $result = print_r(curl_exec($ch), true);
            curl_close($ch);
            $media = json_decode($result);
            if (isset($media->id)) {
                return $media->id;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }

    /**
     * Creating Article sendToWordPress
     *
     */
    public function sendToWordPress($article)
    {
        if (empty($article->website_id)) {
            return false;
        }
        $client = new Client();
        $url = trim($article->website->domain) . "/wp-json/wp/v2/posts";

        $data = [
            'title'   => $this->keywords,
            'status'  => $this->status,
            'content' => $article->full_article,
            'featured_media' => $this->uploadImage($article),
        ];

        $option = [
            'form_params' => $data,
            'auth' => [$article->website->username, $article->website->password]
        ];
        $client->request('POST', $url, $option);

        return true;
    }


    /**
     * Add googleImage when Creating Article
     *
     */
    // public function imageFromGoogle()
    // {
    //     try {
    //         $apiKey = Config::get('custom.api_key');
    //         $searchEngineId =  Config::get('custom.search_engine_id');

    //         $client = new Client();
    //         $response = $client->get('https://www.googleapis.com/customsearch/v1', [
    //             'query' => [
    //                 'key'        => $apiKey,
    //                 'cx'         => $searchEngineId,
    //                 'q'          => $this->keywords,
    //                 'searchType' => 'image',
    //             ],
    //         ]);

    //         $results = json_decode($response->getBody()->getContents());
    //         $feature_image = '';
    //         if (count($results->items) > 0) {
    //             $result = $results->items[0];
    //             $contextLink = $result->image->contextLink;
    //         }
    //         $this->items['feature_image'] = $result->link;

    //         if ($this->image == 'google_image') {
    //             $image = '';
    //             if (count($results->items) > 1) {
    //                 $result = $results->items[1];
    //                 $contextLink = $result->image->contextLink;
    //                 $image .= "<div style='margin-bottom: 10px'>";
    //                 $image .= "<div><img src='$result->link' alt='$result->title'> </div>";
    //                 $image .= "<div> Credit: $contextLink </div>";
    //                 $image .= "</div>";
    //                 $this->items['image'] = $image;
    //             } else {
    //                 $this->items['image'] = $feature_image;
    //             }
    //         }
    //     } catch (\Throwable $th) {
    //         $this->items['image'] = '';
    //         $this->items['feature_image'] = '';
    //     }
    // }


    /**
     * Add YoutubeVideo when Creating Article
     *
     */

    public function videoFromYoutube()
    {
        try {
            $client = new Google_Client();
            $client->setDeveloperKey(Config::get('custom.youtube_api_key'));

            $youtube = new YouTube($client);

            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q' => $this->keywords,
                'maxResults' => 1,
            ));

            $youtubeVideo =  $searchResponse['items'][0]['id']['videoId'];
            $video = "";
            $video .= "<div><iframe width='560' height='315' src='https://www.youtube.com/embed/$youtubeVideo' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>";

            return $video;
        } catch (\Throwable $th) {
            return null;
        }
    }


    /**
     * Add googleImage when Creating Article
     *
     */
    public function imageFromSerper()
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://google.serper.dev/images',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{"q":"' . $this->keywords . '"}',
                CURLOPT_HTTPHEADER => array(
                    'X-API-KEY: ' . Config::get('custom.serper_api_key'),
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            $results = json_decode($response);
            if (count($results->images) > 0) {
                $this->items['feature_image'] = $results->images[0]->imageUrl;
            }

            if ($this->image == 'google_image') {
                $image = '';
                if (count($results->images) > 1) {
                    $result = $results->images[1];
                    $image .= "<div style='margin-bottom: 10px'>";
                    $image .= "<div><img src='$result->imageUrl' alt='$result->title'> </div>";
                    $image .= "<div style='font-size: 14px;color: #737373;'> <small> Image source: $result->link </small></div>";
                    $image .= "</div>";
                    $this->items['image'] = $image;
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->items['image'] = '';
            $this->items['feature_image'] = '';
        }
    }
}
