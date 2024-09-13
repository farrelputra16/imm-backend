@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Create New Post</h1>

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
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="published_at">Published At:</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ now()->timezone('Asia/Jakarta')->format('Y-m-d\TH:i') }}" disabled>
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="img">Images:</label>
                    <input type="file" name="img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="summernote" name="content" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="user_id">Author:</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if($currentUserId==$user->id) selected @endif>{{ $user->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
</div>

<!-- Pass CSRF token as JavaScript variable -->
<script>
    window.csrfToken = '{{ csrf_token() }}';
</script>

<!-- Link the Summernote JavaScript file -->
<script src="{{ asset('js/summernote.min.js') }}"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Content',
        tabsize: 2,
        height: 300,
        callbacks: {
            onImageUpload: function(files) {
                var formData = new FormData();
                formData.append('imgupload', files[0]);
                formData.append('_token', window.csrfToken);
                $.ajax({
                    url: "{{ route('posts.uploadImage') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#summernote').summernote('insertImage', data.url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        }
    });
</script>
@endsection