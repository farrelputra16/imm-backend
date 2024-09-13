@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit SDGs</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('sdgs.update', $sdg->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="img">Images:</label>
                    <input type="file" class="form-control-file" name="img">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $sdg->name }}" required>
                    <label for="order">Order:</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ $sdg->order }}" required>
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $sdg->description }}">
                </div>
                <button type="submit" class="btn btn-primary">Update SDGs</button>
            </form>
        </div>
    </div>
</div>
@endsection
