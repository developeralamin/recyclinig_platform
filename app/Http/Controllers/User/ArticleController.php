<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Website;
use App\Models\InfoArticle;
use App\Models\ArticleGroup;
use App\Jobs\ArticleGenerator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InfoArticleRequest;

class ArticleController extends Controller
{
    /**
     * Check UserCredits when Create article
     */
    public function checkArticleLength($articleType)
    {
        $articleTypes = [
            'short' => 1000,
            'medium' => 1500,
            'long' => 2000,
        ];
        return $articleTypes[$articleType];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemsPerPage = 30;
        $this->data['articles'] =  InfoArticle::where('user_id', Auth::user()->id)->latest('id')->simplePaginate($itemsPerPage);
        $this->data['total_articles'] =  InfoArticle::where('user_id', Auth::user()->id)->count();
        $this->data['page'] =  request()->page ?? 1;
        $this->data['last_id'] =  $this->data['total_articles'] - (($this->data['page'] - 1) * $itemsPerPage);

        return view('user.article.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['websites'] = Website::where('user_id', Auth::user()->id)->get();

        return view('user.article.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoArticleRequest $request)
    {
        $formData  = $request->all();
        $user_id    = Auth::user()->id;
        $keywords = preg_split("/\r\n|\n|\r/", $formData['keywords']);

        $keywordsCount = count($keywords);
        $requiredCredits =  $keywordsCount * $this->checkArticleLength($formData['article_type']);
        Log::info($requiredCredits);

        if (Auth::user()->balance < $requiredCredits) {
            session()->flash('error', "You don't have enough credits to create article");
            return back()->withInput();
        }

        $formData['full_article'] =  '';
        $formData['wp_status'] =  $formData['status'];
        $formData['status'] =  'pending';
        $formData['user_id'] =  $user_id;
        // Create Article Group
        $articleGroup = ArticleGroup::create($formData);

        $formData['article_group_id'] =  $articleGroup->id;
        foreach ($keywords as $key => $keyword) {
            $formData['keywords'] = ucwords($keyword);
            $article = InfoArticle::create($formData);
            ArticleGenerator::dispatch($formData, $article->id);
        }

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['article'] = InfoArticle::findOrFail($id);
        return view('user.article.show', $this->data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InfoArticle::find($id)->delete();

        Toastr::success('Info Article deleted successfully  :)', 'Success');
        return back();
    }
}
