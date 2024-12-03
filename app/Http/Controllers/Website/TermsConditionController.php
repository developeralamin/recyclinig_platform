<?php

namespace App\Http\Controllers\Website;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return termsConditionPage
     *
     */
    public function termsCondition()
    {
        $this->data['pageContent'] = Page::where('slug', 'terms-and-conditions')->firstOrFail();
        return view('website.website_pages', $this->data);
    }
}
