@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('SDGs') }}</h1>

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
    <h1 class="h3 mb-4 text-gray-800">Create New SDGs</h1>

    <!-- Form for creating a new category -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('sdgs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="img">Images:</label>
                    <input type="file" name="img" class="form-control">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="order">Order:</label>
                    <input type="number" class="form-control" id="order" name="order" required>
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <button type="submit" class="btn btn-primary">Create SDGs</button>
            </form>
        </div>
    </div>

</div>

@endsection
