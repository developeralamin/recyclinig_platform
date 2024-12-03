<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordChangedRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm()
    {
        return view('admin.profile.password_change_form');
    }

    /**
     * changePassword in current User.
     *
     * @param PasswordChangedRequest $request
     *
     */
    public function changePassword(PasswordChangedRequest $request)
    {
        $user        = Auth::user();
        $hasPassword = $user->password;

        if (Hash::check($request->oldpassword, $hasPassword)) {
            $user->password = Hash::make($request->password);
            $user->save();

            Toastr::success('Password successfully changed :)', 'Success');
            return redirect()->back();
        } else {
            Toastr::error("Old password doesn't matched :)", 'error');
            return redirect()->back();
        }
    }
}
