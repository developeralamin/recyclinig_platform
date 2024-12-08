@extends('frontend.main')
@section('content')

<section class="banner-area-start">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-all-text">
                    <div class="banner-text">
                        <!-- Table for displaying Recycle Events -->
                        <div class="cardAbout cardEvent">
                            <div class="card-bodyabout">
                                <h5 class="about-title">Recycle Event</h5>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Event Title</th>
                                            <th>Event Date</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $index => $event)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td>{{ $event->created_at->diffForHumans() }}</td>
                                                <td>{{ $event->category->name }}</td>
                                                <td>
                                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm">View</a>
                                                    <!-- <form  method="POST" style="display:inline;">
                                                       
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                                    </form> -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($events->isEmpty())
                                    <p>No recycling events found.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
