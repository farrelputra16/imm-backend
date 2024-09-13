@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Page</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $page->name }}">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="summernote" name="content" rows="4">{{ $page->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="img">Images:</label>
                    <input type="file" class="form-control-file" name="img"> <!-- Add name attribute -->
                </div>
                <button type="submit" class="btn btn-primary">Update Page</button> <!-- Change button type to submit -->
            </form>
        </div>
    </div>
</div>
<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 100
    });
</script>
@endsection
