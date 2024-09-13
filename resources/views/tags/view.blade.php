@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Tag</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                @csrf
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $tag->nama }}" readonly>
                </div>
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('tags.index') }}'">Back</button>
            </form>
        </div>
    </div>
</div>
@endsection
