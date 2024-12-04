@extends('website.layouts.master')
@section('frontend_content')

<section id="home">
    <div class="mt-5">
        <div class="ab">
            <div class="a6 a1K a7 ac">
                <div class="a5 lg:a2u/2 af">
                    <div class="a3g lg:a3h aJ[470px] wow fadeInUp" data-wow-delay=".2s">
                       

                    </div>
                </div>

                <div class="a5 lg:a2u/2 af mt">

                    <div class="ae a2d aA[532px] wow fadeInUp" data-wow-delay=".25s">
                        <div class="a3V a3W sm:a4u[70px] a0 dark:aC a4d a2C a4v dark:a4w">
                            @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                            @endif
                            <h2 class="a2g a1X a3q sm:a2_ a1j dark:a1k a28">Forgot Your Password</h2>

                            <form action="{{ route('forgot-password-post') }}" method="POST" class="user">
                                @csrf
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
                                            <button class="full-width-btn a2x aR a1k a1q a1N a1r a3j a2g hover:a1u">
                                                Send Password Reset Link
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="a5  af">
                                <div class="login-flex a3u">
                                    <p>Don't have an account ?</p> <a class="small-btn" href="{{ route('registration') }}">Registration</a>
                                </div>
                                <div class="login-flex a3u">
                                    <p>Already have an account ?</p> <a class="small-btn" href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection