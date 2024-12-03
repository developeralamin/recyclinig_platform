<?php

namespace App\Http\Controllers\Auth;

use App\Models\SiteInfo;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LoginPage
     *
     */
    public function loginForm()
    {
        $this->data['site_info'] = SiteInfo::firstOrCreate();
        if ($this->data['site_info']->logo) {
            $this->data['site_info']->logo = Storage::url($this->data['site_info']->logo);
        }
        return view('auth.login', $this->data);
    }

    /**
     * Display a listing of the resource.
     *
     * @param LoginRequest $request
     *
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::User();
            if (empty($user->email_verified_at)) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['Please verify your email.']);
            }
            if ($user->is_active == 0) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['Your accout is not active. Please active you account.']);
            }
            return redirect()->intended('user');
        } else {
            return redirect()->route('login')->withErrors(['Invalid Email and password']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param Logout user
     *
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
