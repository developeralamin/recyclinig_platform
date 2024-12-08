@extends('frontend.main')
@section('content')

<!-- banner area start here -->
<section class="banner-area-start">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-all-text">
                    <div class="banner-text">
                        <!-- Loop through participants and display each in a small card -->
                        <div class="row cardScore">
                          
                            @foreach ($participants as $participant)
                            @php
                                $color = substr(md5(strtoupper(substr($participant->name, 0, 1))), 0, 6);
                            @endphp

                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="flex-shrink-0 rounded-full text-white flex items-center justify-center"
                                            style="width: 60px; height: 60px; font-size: 24px; background-color: #{{ $color }}">
                                            {{ strtoupper(substr($participant->name, 0, 1)) }}
                                        </div>                                 
                                        <h5 class="card-title" style="color:#000">{{ $participant->name }}</h5>
                                            <p class="card-text">{{ $participant->total_participation }} recycles </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
