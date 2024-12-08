@extends('frontend.main')
@section('content')
@php
  // Define an array of colors
  $colors = ['#00A9E0', '#FDC82F', '#BF8B2E', '#3F7E44', '#0A97D9', '#56C02B'];
@endphp

  <!-- banner area start here -->
  <!-- banner area start here -->
  <section class="banner-area-start">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-all-text">
            <div class="banner-text">
                  <!-- Card with image -->
              <div class="cardAbout">
                <div class="card-bodyabout">
                  <h5 class="about-title">Recycle Categories</h5>
                  <div class="card-container">
                    @foreach ($categories as $index => $category)
                    <a href="{{ route('recycle-event',$category->slug) }}">
                      <div class="card" style="background-color: {{ $colors[$index % count($colors)] }};">
                        <img src="{{ $category->icon }}" alt="{{ $category->name }} Icon">
                        <p>{{ $category->name }}</p>
                      </div>
                      </a>
                    @endforeach
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection