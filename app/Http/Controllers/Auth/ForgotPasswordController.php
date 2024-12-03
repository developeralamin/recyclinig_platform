<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\MailNotify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return showForgetPasswordForm
     *
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgot_password');
    }

    /**
     * Display a listing of the resource.
     *
     * @return submitForgetPasswordForm
     *
     */
    public function submitForgetPasswordForm(ForgotPasswordRequest $request)
    {
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->send(new MailNotify($token));

        return back()->with('message', 'We have send your password reset link!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return showResetPasswordForm
     *
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgot_password_link', ['token' => $token]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return submitResetPasswordForm
     *
     */
    public function submitResetPasswordForm(ResetPasswordRequest $request)
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        //UpdatePassword when token in valid
        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('login')->with('message', 'Your password has been changed!');
    }
}
