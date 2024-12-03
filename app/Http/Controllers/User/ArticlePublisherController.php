<?php

namespace App\Http\Controllers\User;

use GuzzleHttp\Client;
use App\Models\InfoArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlePublisherController extends Controller
{
    public function publish(Request $request, int $articleId)
    {
        $article = InfoArticle::findOrFail($articleId);
        try {
            $this->sendToWordPress($article);
            $article->is_published = true;
            $article->save();
            return redirect()->back()->with('success', 'Article published successfully');
        } catch (\Exception $e) {
            $article->is_published = false;
            $article->errors = $e->getMessage();
            $article->save();
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Article published successfully');
    }

    /**
     * Creating Article uploadImage
     *
     */
    public function uploadImage($article)
    {
        if (empty($article->feature_image)) {
            return null;
        }
        try {
            $url = trim($article->website->domain) . "/wp-json/wp/v2/media";
            // Set the headers for the POST request
            $username = $article->website->username;
            $password = $article->website->password;

            $file = file_get_contents($article->feature_image);
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Disposition: form-data; filename="' . $article->feature_image . '"',
                'Authorization: Basic ' . base64_encode($username . ':' . $password),
            ]);
            $result = print_r(curl_exec($ch), true);
            curl_close($ch);
            $media = json_decode($result);
            if (empty($media->id)) {
                return null;
            }

            return $media->id;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Creating Article sendToWordPress
     *
     */
    public function sendToWordPress($article)
    {
        $client = new Client();
        $url = trim($article->website->domain) . "/wp-json/wp/v2/posts";

        $data = [
            'title'   => $article->keywords,
            'status'  => $article->wp_status,
            'content' => $article->full_article,
            'featured_media' => $this->uploadImage($article)
        ];

        $option = [
            'form_params' => $data,
            'auth' => [$article->website->username, $article->website->password]
        ];
        $client->request('POST', $url, $option);
    }
}
