@extends('frontend.main')
@section('content')

<section class="banner-area-start">
    <div class="container">
        <div class="row justify-content-center">
            <div style="margin-top: 50px;background-color: aliceblue;">
                <div>
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recycle Event Details</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Event Title:</strong> {{ $event->title }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $event->description ?? 'No description provided.' }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $event->created_at->diffForHumans() ?? 'TBD' }}</p>
                        <!-- <p class="card-text"><strong>Location:</strong> {{ $event->location ?? 'TBD' }}</p> -->
                    </div>
                    <div class="card-footer text-end">
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to recycle this event?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-recycle"></i> Recycle
                            </button>
                        </form>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back Event List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
