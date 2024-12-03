<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\PasswordChangedRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return viewProfile
     */
    public function viewProfile()
    {
        $this->data['user']  = User::find(Auth::user()->id);
        if ($this->data['user']->photo) {
            $this->data['user']->photo = Storage::url($this->data['user']->photo);
        }
        return view('user.profile.view_profile', $this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        $this->data['user'] = User::find(Auth::user()->id);
        if ($this->data['user']->photo) {
            $this->data['user']->photo = Storage::url($this->data['user']->photo);
        }
        return view('user.profile.update_profile', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateProfileRequest $request
     *
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $authId = Auth::user()->id;
        $user = User::find($authId);

        if ($request->file('photo')) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $user['photo']  = Storage::putFile('user', $request->file('photo'));
        }
        $user->name    = request('name');
        $user->email   = request('email');
        $user->phone   = request('phone');
        $user->save();

        Toastr::success('User profile successfully update :)', 'Success');
        return redirect()->route('user-profile-view');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm()
    {
        return view('user.profile.password_change_form');
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
            return back();
        } else {
            Toastr::error("Old password doesn't matched :)", 'error');
            return redirect()->back();
        }
    }
}
