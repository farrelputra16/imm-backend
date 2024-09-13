<!-- resources/views/tags/index.blade.php -->

@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Tag List</h1>
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create New Tag</a>
        @if ($tags->isEmpty())
            <p>No tags found.</p>
        @else
            <table id="tags-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->nama }}</td>
                            <td>
                                <a href="{{ route('tags.view', $tag->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-pencil-alt" style="color: #ffffff;"></i></a>
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this tag?')">
                                        <i class="fas fa-trash" style="color: #ffffff;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#tags-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
