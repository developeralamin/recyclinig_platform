@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<!-- Page Heading -->

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @if(session('error'))
            <div class="alert alert-danger">
                {!! session('error') !!}
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-thin text-primary">Generate Articles</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <form action="{{ route('article.store') }}" method="post">
                                @csrf
                                <div class="form-group small-input">
                                    <label for="name"> Article keywords <span class="text-danger"> * </span> </label>
                                    <div class="form-group">
                                        <textarea required name="keywords" class="form-control @error('keywords') is-invalid @enderror" placeholder="Enter article keywords" id="keywords" cols="60" rows="3"></textarea>
                                        <small class="help_text">Maximum 1000 keywords</small>
                                        @if ($errors->has('keywords'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keywords') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row small-input">
                                    <div class="col-md-6">
                                        <div class="form-group small-input">
                                            <label for="name">Website </label>
                                            <select class="form-control @error('website_id') is-invalid @enderror" name="website_id" id="website_id">
                                                <option selected value="">Select Website</option>
                                                @foreach($websites as $website)
                                                <option value="{{ $website->id }}" @if(old('website_id')==$website->id) selected @endif>{{ $website->title }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('website_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('website_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group small-input">
                                            <label for="name">Status <span class="text-danger"> * </span> </label>
                                            <select required class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                                <option selected value="draft" @if (old('status')=="draft" ) selected @endif>Draft</option>
                                                <option value="publish" @if (old('status')=="publish" ) selected @endif>Publish</option>
                                            </select>
                                            @if ($errors->has('status'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row small-input">
                                    <div class="col-md-6">
                                        <div class="form-group small-input">
                                            <label for="name">Article Type <span class="text-danger"> * </span> </label>
                                            <small>
                                                <a href="https://blogen.net/user-guide" target="_blank" rel="noopener noreferrer"> Article type details </a>
                                            </small>
                                            <select required class="form-control @error('article_type') is-invalid @enderror" name="article_type" id="article_type">
                                                <option selected value="">Select type</option>
                                                <option value="short" @if (old('article_type')=="short" ) selected @endif>Short</option>
                                                <option value="medium" @if (old('article_type')=="medium" ) selected @endif>Medium</option>
                                                <option value="long" @if (old('article_type')=="long" ) selected @endif>Long</option>
                                            </select>
                                            @if ($errors->has('article_type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('article_type') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group small-input">
                                            <label for="format">Article Format <span class="text-danger"> * </span> </label>
                                            <small>
                                                <a href="https://blogen.net/user-guide" target="_blank" rel="noopener noreferrer"> Format details </a>
                                            </small>
                                            <select required class="form-control @error('format') is-invalid @enderror" name="format" id="format">
                                                <option selected value="">Select format</option>
                                                <option value="format1" @if (old('format')=="format1" ) selected @endif>Format1</option>
                                                <option value="format2" @if (old('format')=="format2" ) selected @endif>Format2</option>
                                                <option value="format3" @if (old('format')=="format3" ) selected @endif>Format3</option>
                                                <option value="format4" @if (old('format')=="format4" ) selected @endif>Format4</option>
                                            </select>
                                            @if ($errors->has('format'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('format') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row small-input">
                                    <!-- image form google -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="name">Image </label>
                                        <div class="form-check">
                                            <input value="google_image" class="form-check-input" type="radio" name="has_image" value="google_image" id="image1">
                                            <label class="form-check-label" for="image1">
                                                Add image from Google
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input value="0" class="form-check-input" type="radio" name="has_image" value="0" id="image2" checked>
                                            <label class="form-check-label" for="image2">
                                                Don't add image
                                            </label>
                                        </div>
                                        @if ($errors->has('has_image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('has_image') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <!-- youtube_video -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="name">Youtube Video </label>
                                        <div class="form-check">
                                            <input value="youtube_video" class="form-check-input" type="radio" name="has_youtube_video" id="video1">
                                            <label class="form-check-label" for="video1">
                                                Add video from Youtube
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input value="0" class="form-check-input" type="radio" name="has_youtube_video" id="video2" checked>
                                            <label class="form-check-label" for="video2">
                                                Don't add video
                                            </label>
                                        </div>
                                        @if ($errors->has('has_youtube_video'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('has_youtube_video') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <!-- faq for article -->
                                    <div class="col-sm-4 mb-sm-0">
                                        <label for="name">FAQ</label>
                                        <div class="form-check">
                                            <input value="1" class="form-check-input" type="radio" name="has_faq" id="faq1">
                                            <label class="form-check-label" for="faq1">
                                                Add FAQ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input value="0" class="form-check-input" type="radio" name="has_faq" id="faq2" checked>
                                            <label class="form-check-label" for="faq2">
                                                Don't add FAQ
                                            </label>
                                        </div>
                                        @if ($errors->has('has_faq'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('has_faq') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
