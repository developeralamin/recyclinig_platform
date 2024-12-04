<?php

namespace App\Http\Controllers\User;

use App\Models\InfoArticle;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UserDashboardPage
     *
     */
    public function index()
    {
        return view('user.content');
    }

    /**
     * User All Stats in Dashboard
     *
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }
}
