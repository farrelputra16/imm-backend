<!-- resources/views/pages/create.blade.php -->
@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Page') }}</h1>

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

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create New Page</h1>

    <!-- Form for creating a new page -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="summernote" name="content" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="img">Images:</label>
                    <input type="file" name="img" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create Page</button>
            </form>
        </div>
    </div>

</div>

<!-- Pass CSRF token as JavaScript variable -->
<script>
    window.csrfToken = '{{ csrf_token() }}';
</script>

<!-- Link the JavaScript file -->
<script src="{{ asset('js/multiple_file_upload.js') }}"></script>

<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 100
    });
</script>

@endsection
