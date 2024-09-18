@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View People</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $people->name }}" readonly>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ ucfirst($people->role) }}" readonly>
            </div>

            <div class="form-group">
                <label for="primary_job_title">Primary Job Title:</label>
                <input type="text" class="form-control" id="primary_job_title" name="primary_job_title" value="{{ $people->primary_job_title }}" readonly>
            </div>

            <div class="form-group">
                <label for="primary_organization">Primary Organization:</label>
                <input type="text" class="form-control" id="primary_organization" name="primary_organization" value="{{ $people->primary_organization }}" readonly>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $people->location }}" readonly>
            </div>

            <div class="form-group">
                <label for="regions">Regions:</label>
                <input type="text" class="form-control" id="regions" name="regions" value="{{ $people->regions }}" readonly>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" class="form-control" id="gender" name="gender" value="{{ ucfirst($people->gender) }}" readonly>
            </div>

            <div class="form-group">
                <label for="linkedin_link">LinkedIn Link:</label>
                <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ $people->linkedin_link }}" readonly>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" readonly>{{ $people->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $people->phone_number }}" readonly>
            </div>

            <div class="form-group">
                <label for="gmail">Gmail:</label>
                <input type="email" class="form-control" id="gmail" name="gmail" value="{{ $people->gmail }}" readonly>
            </div>

            <a href="{{ route('people.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
