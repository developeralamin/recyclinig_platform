@extends('layouts.admin')
@section('main_content')

<div class="container">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Update SiteInfo</h4>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <form action=" {{ route('site-info.update',$site_info->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name"> Tagline </label>
                            <input type="text" class="form-control" value="{{ $site_info->tagline }}" name="tagline" placeholder="Enter SiteInfo Tagline">
                        </div>
                        <div class="form-group">
                            <label for="name">Title </label>
                            <input type="text" class="form-control" value="{{ $site_info->title }}" name="title" placeholder="Enter SiteInfo Title">
                        </div>

                        <div class="form-group">
                            <label for="name">Meta Keywords </label>
                            <input type="text" class="form-control" value="{{ $site_info->meta_keywords }}" name="meta_keywords" placeholder="Enter SiteInfo Meta Keywords">
                        </div>
                        <div class="form-group">
                            <label for="name"> Meta Description </label>
                            <input type="text" class="form-control" value="{{ $site_info->meta_description }}" name="meta_description" placeholder="Enter SiteInfo Meta Description">
                        </div>
                        <div class="form-group">
                            <label for="name">OpenAI API Key </label>
                            <input type="text" class="form-control" value="{{ $site_info->openai_api_key }}" name="openai_api_key" placeholder="Enter SiteInfo OpenAI API Key">
                        </div>

                        <div class="form-group">
                            <label for="logo"> Logo </label>
                            <input type="file" class="form-control" id="product_thumbnail" name="logo" onchange="document.getElementById('blahId').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="controls">
                            @if(!$site_info->logo)
                            <img id="blahId" width="400" height="400" src="{{  $site_info->logo }}" style="width: 300px;height: 300px;border: 1px solid #000000" alt="Siteinfo logo">
                            @elseif($site_info->logo)
                            <img id="blahId" width="400" height="400" src="{{  $site_info->logo }}" style="width: 300px;height: 300px;border: 1px solid #000000" alt="Siteinfo logo">
                            @endif
                        </div>
                        </br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


@endsection