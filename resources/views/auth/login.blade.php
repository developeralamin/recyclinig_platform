@extends('website.layouts.master')

@section('title')
    {{ $site_info->tagline }}
@endsection

@section('frontend_content')
<section id="home">
    <div class="">
        <div class="ab">
            <div class="a6 a1K a7 ac">
                <div class="a5 lg:a2u/2 af">
                    <div class="a3g lg:a3h aJ[470px] wow fadeInUp" data-wow-delay=".2s">
                        <h1 class="a25 a1j dark:a1k a2_ md:a30[45px] a31 md:a31 a1O">
                            {{ $site_info->title }}
                        </h1>
                        <p class="a25 aR aT a3i">
                        {{ $site_info->meta_description }}
                        </p>
                    </div>
                </div>

                <div class="a5 lg:a2u/2 af">

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="ae a2d aA[532px] wow fadeInUp" data-wow-delay=".25s">
                        <div class="a3V a3W sm:a4u[70px] a0 dark:aC a4d a2C a4v dark:a4w">
                            <h2 class="a2g a1X a3q sm:a2_ a1j dark:a1k a28">Login</h2>
                            <form action="{{ route('login-confirm') }}" method="post">
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
                                            <label for="password">Password <span class="text-danger"> * </span></label>
                                            <input type="password" name="password" placeholder="Enter your password" class="a5 a25 a1i aT av[14px] a3X aw a2C a4v dark:a4w aK dark:a1 a2E a4x focus-visible:aN focus:a2F" class="form-control {{ $errors->has('password') ? 'error' : '' }}" />
                                            <font style="color: red">
                                                {{ ($errors->has('password'))?($errors->first('password')):'' }}
                                            </font>
                                        </div>
                                    </div>
                                    <div class="a5 af remember-btn">
                                        <div class="a3u">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>

                                        </div>
                                        <div class="a3u">
                                            <a class="small-btn" href="{{ route('forgot.password') }}">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="a5 af">
                                        <div class="a3u">
                                            <button class="button-bg full-width-btn a2x aR a1k a1q a1N a1r a3j a2g hover:a1u">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="a5  af">
                                <div class="login-flex a3u">
                                    <p>Don't have an account ?</p> <a class="small-btn" href="{{ route('registration') }}">Registration</a>
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
