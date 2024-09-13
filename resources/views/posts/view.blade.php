@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">View Post</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger border-left-danger" role="alert">
        <ul class="pl-4 my-2">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
            <div class="form-group">
                    <label for="published_at">Published At:</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ $post->created_at }}" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" readonly>
                </div>
                <div class="form-group">
                    <label for="img">Images:</label>
                    <div id="img">
                        <img src="{{ asset('images/' . $post->img) }}" height="50" width="50">
                        <p>{{ basename($post->img) }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="summernote" name="content" rows="4" readonly>{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="user_id">Author:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $post->user->full_name }}" readonly>
                </div>
                <a type="button" class="btn btn-primary" href='{{ route('posts.index') }}'>Back</a>
            </form>
        </div>
    </div>
</div>

<!-- Link the Summernote JavaScript file -->
<script src="{{ asset('js/summernote.min.js') }}"></script>

<script>
    $('#summernote').summernote('disable');
</script>
@endsection
