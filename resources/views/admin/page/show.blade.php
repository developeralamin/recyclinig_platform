@extends('layouts.admin')
@section('main_content')

<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <div>
            <h4 class="m-0 text-primary">Page Information</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>Title:</th>
                        <td>{{ $page->title}}</td>
                    </tr>
                    <tr>
                        <th>Slug:</th>
                        <td>{{ $page->slug}}</td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td>{!!$page->description!!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection