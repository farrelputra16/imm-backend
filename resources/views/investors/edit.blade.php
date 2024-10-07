@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Investor</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('investors.update', $investor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="org_name">Organization Name:</label>
                    <input type="text" class="form-control" id="org_name" name="org_name" value="{{ $investor->org_name }}" required>

                    <label for="number_of_contacts">Number of Contacts:</label>
                    <input type="number" class="form-control" id="number_of_contacts" name="number_of_contacts" value="{{ $investor->number_of_contacts }}" required>

                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $investor->location }}" required>

                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $investor->description }}</textarea>

                    <!-- Dropdown untuk Departments -->
                    <label for="departments">Departments:</label>
                    <select class="form-control" id="departments" name="departments" required>
                        <option value="Finance" {{ $investor->departments == 'Finance' ? 'selected' : '' }}>Finance</option>
                        <option value="Marketing" {{ $investor->departments == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="Technology" {{ $investor->departments == 'Technology' ? 'selected' : '' }}>Technology</option>
                        <option value="Operations" {{ $investor->departments == 'Operations' ? 'selected' : '' }}>Operations</option>
                        <option value="Human Resources" {{ $investor->departments == 'Human Resources' ? 'selected' : '' }}>Human Resources</option>
                        <option value="Legal" {{ $investor->departments == 'Legal' ? 'selected' : '' }}>Legal</option>
                    </select>

                    <!-- Dropdown untuk Investment Stage -->
                    <label for="investment_stage">Investment Stage:</label>
                    <select class="form-control" id="investment_stage" name="investment_stage">
                        <option value="Seed" {{ $investor->investment_stage == 'Seed' ? 'selected' : '' }}>Seed</option>
                        <option value="Series A" {{ $investor->investment_stage == 'Series A' ? 'selected' : '' }}>Series A</option>
                        <option value="Series B" {{ $investor->investment_stage == 'Series B' ? 'selected' : '' }}>Series B</option>
                        <option value="Series C" {{ $investor->investment_stage == 'Series C' ? 'selected' : '' }}>Series C</option>
                        <option value="Growth" {{ $investor->investment_stage == 'Growth' ? 'selected' : '' }}>Growth</option>
                        <option value="IPO" {{ $investor->investment_stage == 'IPO' ? 'selected' : '' }}>IPO</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Investor</button>
            </form>
        </div>
    </div>
</div>
@endsection
