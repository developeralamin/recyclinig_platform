<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return pricing
     *
     */
    public function pricing()
    {
        return view('website.package.package');
    }
}
