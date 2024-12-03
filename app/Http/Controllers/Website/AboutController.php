<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AboutPage
     *
     */
    public function about()
    {
        $this->data['pageContent'] = Page::where('slug', 'about')->firstOrFail();
        return view('website.website_pages', $this->data);
    }
}
