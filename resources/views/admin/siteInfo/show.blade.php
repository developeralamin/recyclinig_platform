@extends('layouts.admin')
@section('main_content')

<div class="container">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <div class="container">
                <div class="row">
                    <div class="col-md-11">
                        <div>
                            <h4 class="m-0 font-weight-bold text-primary">SiteInfo</h4>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a href="{{ route('site-info.edit',$site_info->id) }}" class="btn btn-primary btn-rounded mr-5 float-left"> Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th> Title:</th>
                            <td>{{ $site_info->title }}</td>
                        </tr>
                        <tr>
                            <th> Tagline: </th>
                            <td> {{ $site_info->tagline }} </td>
                        </tr>
                        <tr>
                            <th> Meta Keywords:</th>
                            <td> {{ $site_info->meta_keywords }} </td>
                        </tr>
                        <tr>
                            <th> Meta Description: </th>
                            <td> {{ $site_info->meta_description }} </td>
                        </tr>
                        <tr>
                            <th> AI Key: </th>
                            <td> {{ $site_info->openai_api_key }} </td>
                        </tr>
                        <tr>
                            <th>Logo:</th>
                            <td>
                                @if($site_info->logo)
                                <img width="200" src="{{ $site_info->logo }}" alt="logo">
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection