@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Tag</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Name:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $tag->nama }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Tag</button>
            </form>
        </div>
    </div>
</div>
@endsection
