<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SiteInfo;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegistrationRequest;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return registrationForm
     *
     */
    public function registrationForm()
    {
        $this->data['site_info'] = SiteInfo::firstOrCreate();
        if ($this->data['site_info']->logo) {
            $this->data['site_info']->logo = Storage::url($this->data['site_info']->logo);
        }
        return view('auth.registration', $this->data);
    }

    /**
     * Creating  a new User.
     *
     * @param RegisterRequest $request
     *
     * @return Response
     */
    public function customRegistration(RegistrationRequest $request)
    {
        $token = Str::random(40);
        $user                           = new User();
        $user->name                     = $request->name;
        $user->email                    = strtolower($request->email);
        $user->password                 = bcrypt($request->password);
        $user->remember_token           = $token;
        $user->email_varification_token = $token;
        $user->is_active                = 1;
        $user->balance                  = 5000;
        $user->expire_date              = Carbon::now()->addDays(30);
        $user->save();

        Mail::to($user->email)->send(new VerificationEmail($user));

        session()->flash('message', 'Thanks for Registration. To activate your account, please check your email.');

        return redirect()->route('login');
    }


    public function verifyEmail( $token )
    {
        $user = User::where('email_varification_token', $token)->first();
        if ( $user ) {
            $user->email_verified_at = Carbon::now();
            $user->is_active = 1;
            $user->email_varification_token = null;
            $user->save();

            session()->flash('message', 'Your account is activated. Please login.');

            return redirect()->route('login');
        } else {
            return redirect()->route('login')->withErrors(['Sorry !! Your token is not matched.']);
        }
    }
}
