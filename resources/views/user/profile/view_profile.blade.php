@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<div class="container-fluid">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body text-center">
                        <div class="mt-3 mb-4">
                            @if($user->photo)
                            <img class="rounded-circle" style="width: 100px;" src="{{ $user->photo }}" class="rounded-circle img-fluid" style="width: 100px;">
                            @else
                            <img src="https://ui-avatars.com/api/" class="rounded-circle img-fluid" style="width: 100px;" />
                            @endif
                        </div>
                        <h4 class="mb-2">{{ $user->name }}</h4>
                        <p class="text-muted mb-4"> {{ $user->email }} <span class="mx-2">|</span> {{$user->phone}}</p>
                        <a href="{{ route('user-profile-edit') }}" class="btn btn-primary btn-rounded btn-lg"> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection