@extends('layouts.backend')
@section('page_body')

@php
$prefix = Request::route()->getprefix();
$route = Route::current()->getName();

@endphp


<header class="main-bg a5 a6 a7 a8 a9 aa wow fadeInUp" data-wow-delay=".2s">
    <div class="ab">
        <div class="a6 ac a7 ad ae">
            <div class="af ag ah">
                <a href="{{ route('user') }}" :class="scrolledFromTop ? 'ai lg:aj' : 'ak lg:ai' " class="a5 al">
                    
                    <!-- <img src="{{ asset('backend/img/_background.png') }}" alt="logo" class="a5 dark:am" /> -->

                </a>
            </div>
            <div class="a6 af an a7 a5">
                <div>
                    <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive' " id="navbarToggler" class="al ao ap aq/2 ar/2 lg:am focus:as at au av[6px] aw">
                        <span :class="navbarOpen && 'ax ay[7px]' " class="ae az[30px] aA[2px] aB[6px] al aC dark:a0"></span>
                        <span :class="navbarOpen && 'aD' " class="ae az[30px] aA[2px] aB[6px] al aC dark:a0"></span>
                        <span :class="navbarOpen && 'ay[-8px] aE[135deg]' " class="ae az[30px] aA[2px] aB[6px] al aC dark:a0"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>