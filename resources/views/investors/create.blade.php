<!-- resources/views/investors/create.blade.php -->
@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Investor') }}</h1>

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
    <h1 class="h3 mb-4 text-gray-800">Create New Investor</h1>

    <!-- Form for creating a new investor -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('investors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="org_name">Organization Name:</label>
                    <input type="text" class="form-control" id="org_name" name="org_name" required>

                    <label for="number_of_contacts">Number of Contacts:</label>
                    <input type="number" class="form-control" id="number_of_contacts" name="number_of_contacts" required>

                    <label for="number_of_investments">Number of Investments:</label>
                    <input type="number" class="form-control" id="number_of_investments" name="number_of_investments" required>

                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" required>

                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>

                    <label for="departments">Departments:</label>
                    <input type="text" class="form-control" id="departments" name="departments" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Investor</button>
            </form>
        </div>
    </div>

</div>

@endsection
