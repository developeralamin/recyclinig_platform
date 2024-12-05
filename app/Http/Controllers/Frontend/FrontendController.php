<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function how(){
        return view('frontend.how.index');
    }
    public function category()
    {
        return view('frontend.category.index');
    }
    public function about()
    {
        return view('frontend.about.index');
    }
    public function scroreboard()
    {
        return view('frontend.scoreboard.index');
    }
    public function recyclingCenter()
    {
        return view('frontend.scoreboard.index');
    }
}
