@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Investor</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="org_name">Organization Name:</label>
                <input type="text" class="form-control" id="org_name" name="org_name" value="{{ $investor->org_name }}" readonly>
            </div>

            <div class="form-group">
                <label for="number_of_contacts">Number of Contacts:</label>
                <input type="text" class="form-control" id="number_of_contacts" name="number_of_contacts" value="{{ $investor->number_of_contacts }}" readonly>
            </div>

            <div class="form-group">
                <label for="number_of_investments">Number of Investments:</label>
                <input type="text" class="form-control" id="number_of_investments" name="number_of_investments" value="{{ $investor->number_of_investments }}" readonly>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $investor->location }}" readonly>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" readonly>{{ $investor->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="departments">Departments:</label>
                <input type="text" class="form-control" id="departments" name="departments" value="{{ $investor->departments }}" readonly>
            </div>

            <a href="{{ route('investors.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
