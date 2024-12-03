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
        $user = Auth::user();
        if ($user->expire_date < date('Y-m-d')) {
            $user->balance = 0;
            $user->save();
        }

        $this->data['total_article'] =  InfoArticle::where('user_id', Auth::user()->id)->count();
        $this->data['total_website'] =  Website::where('user_id', Auth::user()->id)->count();
        $this->data['total_payment'] =  Payment::where('user_id', Auth::user()->id)->sum('amount');
        $this->data['total_balance'] =  Auth::user()->balance;

        return view('user.dashboard', $this->data);
    }
}
