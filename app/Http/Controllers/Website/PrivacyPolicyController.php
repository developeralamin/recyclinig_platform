<?php

namespace App\Http\Controllers\Website;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return privacyPolicyPage
     *
     */
    public function privacyPolicy()
    {
        $this->data['pageContent'] = Page::where('slug', 'privacy-and-policy')->firstOrFail();
        return view('website.website_pages', $this->data);
    }
}
