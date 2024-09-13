@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Posts</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
            </div>
            <div class="card-body">
                @if ($posts->isEmpty())
                    <p>No posts found.</p>
                @else
                    <div class="table-responsive">
                        <table id="posts-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $post->img) }}" height="50" width="50">
                                        </td>
                                        <td>{!! $post->content !!}</td>
                                        <td>{{ $post->user->full_name }}</td>
                                        <td>
                                            <a href="{{ route('posts.view', $post->id) }}"
                                                class="btn btn-sm btn-primary m-1" title="View">
                                                <i class="fas fa-info-circle" style="color: #ffffff;"></i>
                                            </a>
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="btn btn-sm btn-primary m-1" title="Edit">
                                                <i class="fas fa-pencil-alt" style="color: #ffffff;"></i>
                                            </a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger m-1" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                                    <i class="fas fa-trash" style="color: #ffffff;"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#posts-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
