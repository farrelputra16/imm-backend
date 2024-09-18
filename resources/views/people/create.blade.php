@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('People') }}</h1>

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
    <h1 class="h3 mb-4 text-gray-800">Create New People</h1>

    <!-- Form for creating new people -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('people.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>

                    <label for="role">Role:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="mentor">Mentor</option>
                        <option value="pekerja">Pekerja</option>
                        <option value="konsultan">Konsultan</option>
                    </select>

                    <label for="primary_job_title">Primary Job Title:</label>
                    <input type="text" class="form-control" id="primary_job_title" name="primary_job_title" required>

                    <label for="primary_organization">Primary Organization:</label>
                    <input type="text" class="form-control" id="primary_organization" name="primary_organization" required>

                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" required>

                    <label for="regions">Regions:</label>
                    <input type="text" class="form-control" id="regions" name="regions" required>

                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="linkedin_link">LinkedIn Link:</label>
                    <input type="url" class="form-control" id="linkedin_link" name="linkedin_link">

                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>

                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>

                    <label for="gmail">Gmail:</label>
                    <input type="email" class="form-control" id="gmail" name="gmail" required>
                </div>
                <button type="submit" class="btn btn-primary">Create People</button>
            </form>
        </div>
    </div>

</div>

@endsection
