@extends('layouts.user')
@section('main_content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page City -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Articles</h1>
        <a href="{{ route('article.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Article
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Articles</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Keywords</th>
                            <th>Status</th>
                            <th>Website</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($articles as $key=>$article)
                        <tr>
                            <td>{{ $last_id }}</td>
                            <td>{{ ucwords($article->keywords) }}</td>
                            <td>
                                @if($article->status == 'pending')
                                <span class="badge badge-secondary">{{ $article->status }}</span>
                                @elseif($article->status == 'processing')
                                <span class="badge badge-warning">{{ $article->status }}</span>
                                @elseif($article->status == 'done')
                                <span class="badge badge-success">{{ $article->status }}</span>
                                @endif
                            </td>
                            <td>{{ $article->website->title ?? '' }}</td>
                            <td>
                                @if($article->is_published)
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-warning">No</span>
                                @endif
                            </td>

                            <td>
                                <form method='post' action="{{ route('article.destroy',$article->id) }}">
                                    <a href="{{ route('article.show',$article->id) }}" class="btn btn-success  btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger  btn-sm"> <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $last_id = $last_id - 1; ?>
                        @endforeach
                    </tbody>
                </table>
                {!! $articles->links()  !!}
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
