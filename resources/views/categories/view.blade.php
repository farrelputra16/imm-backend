@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Category</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" readonly>
                </div>
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('categories.index') }}'">Back</button>
            </form>
        </div>
    </div>
</div>
@endsection
