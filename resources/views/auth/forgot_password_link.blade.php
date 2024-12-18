@extends('website.layouts.master')
@section('frontend_content')

<section id="home">
    <div class="registration a2V a2W a2X a2r dark:a2Y[#3c3e56] dark:a2Z a3b[120px] a2U  a3e lg:a3f">
        <div class="ab">
            <div class="a6 a1K a7 ac">
                <div class="a5 lg:a2u/2 af">
                    <div class="a3g lg:a3h aJ[470px] wow fadeInUp" data-wow-delay=".2s">
                        <h1 class="a25 a1j dark:a1k a2_ md:a30[45px] a31 md:a31 a1O">
                            Generate Blog Article
                            <span class="a2x">By AI</span>
                        </h1>
                        <p class="a25 aR aT a3i">
                            Write Full AI blog posts & auto publish to your website. 100% unique & human readable content
                            Automation for building Amazon, Adsense & Ezoic based sites. SEO friendly content.
                        </p>
                    </div>
                </div>
                <div class="a5 lg:a2u/2 af">
                    <div class="ae a2d aA[532px] wow fadeInUp" data-wow-delay=".25s">
                        <div class="a3V a3W sm:a4u[70px] a0 dark:aC a4d a2C a4v dark:a4w">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <h2 class="a2g a1X a3q sm:a2_ a1j dark:a1k a28">Reset Password</h2>
                            <form action="{{ route('reset-password-post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="a6 a1K ac">
                                    <div class="a5  af">
                                        <div class="a3u">
                                            <label for="email">Email <span class="text-danger"> * </span></label>
                                            <input type="text" name="email" placeholder="Enter your email" class="a5 a25 a1i aT av[14px] a3X aw a2C a4v dark:a4w aK dark:a1 a2E a4x focus-visible:aN focus:a2F" class="form-control {{ $errors->has('email') ? 'error' : '' }}" />
                                            <font style="color: red">
                                                {{ ($errors->has('email'))?($errors->first('email')):'' }}
                                            </font>
                                        </div>
                                    </div>
                                    <div class="a5 af">
                                        <div class="a3u">
                                            <label for="password">Password <span class="text-danger"> * </span></label>
                                            <input type="password" name="password" placeholder="Enter your password" class="a5 a25 a1i aT av[14px] a3X aw a2C a4v dark:a4w aK dark:a1 a2E a4x focus-visible:aN focus:a2F" class="form-control {{ $errors->has('password') ? 'error' : '' }}" />
                                            <font style="color: red">
                                                {{ ($errors->has('password'))?($errors->first('password')):'' }}
                                            </font>
                                        </div>
                                    </div>
                                    <div class="a5 af">
                                        <div class="a3u">
                                            <label for="password_confirmation">Confirm Password <span class="text-danger"> * </span></label>
                                            <input type="password" name="password_confirmation" placeholder="Enter your password confirmation" class="a5 a25 a1i aT av[14px] a3X aw a2C a4v dark:a4w aK dark:a1 a2E a4x focus-visible:aN focus:a2F" class="form-control {{ $errors->has('password_confirmation') ? 'error' : '' }}" />
                                            <font style="color: red">
                                                {{ ($errors->has('password_confirmation'))?($errors->first('password_confirmation')):'' }}
                                            </font>
                                        </div>
                                    </div>

                                    <div class="a5 af">
                                        <div class="a3u">
                                            <button class="full-width-btn a2x aR a1k a1q a1N a1r a3j a2g hover:a1u">
                                                Reset Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection