@extends('layouts.user')
@section('main_content')
<!-- Page Heading -->
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif

    <!-- Page City -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Article Details</h1>
        <a href="{{ route('publish-article', $article->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Re Publish
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
             <strong> Keyword: </strong> {{ ucwords($article->keywords)}}
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-10 article-description">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <th>Article Type</th>
                                    <td> {{ ucwords($article->article_type) }} </td>
                                </tr>
                                <tr>
                                    <th>Article Format</th>
                                    <td> {{ ucwords($article->format) }} </td>
                                </tr>
                                <tr>
                                    <th>Add Image</th>
                                    <td>
                                        @if($article->has_image)
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Add YouTube Video</th>
                                    <td>
                                        @if($article->has_youtube_video)
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Add FAQ</th>
                                    <td>
                                        @if($article->has_faq)
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <th>Article Length</th>
                                    <td> {{ ucwords($article->length) }} </td>
                                </tr>
                                <tr>
                                    <th>Status </th>
                                    <td>
                                        @if($article->status == 'done')
                                            <span class="badge badge-success">
                                        @elseif($article->status == 'processing')
                                            <span class="badge badge-warning">
                                        @else
                                            <span class="badge badge-info">
                                        @endif
                                        {{ $article->status}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Website </th>
                                    <td> {{optional($article->website)->domain }} </td>
                                </tr>
                                <tr>
                                    <th>WordPress Status </th>
                                    <td> {{ $article->wp_status}} </td>
                                </tr>
                                <tr>
                                    <th>Published</th>
                                    <td>
                                        @if($article->is_published)
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <br /><br />
                    <h1 class="m-0 text-primary"> {{ ucwords($article->keywords)}} </h1>
                    <!-- Show featue image of the article -->
                    @if($article->has_image)
                    <img src="{{ $article->feature_image }}" class="img-fluid p-4" />
                    @endif

                    {!! $article->full_article !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
