@extends('layouts.admin')

@section('main-content')
<h1>Create New Investor</h1>

<form action="{{ route('investors.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="org_name">Organization Name (Optional):</label>
        <select name="org_name" id="org_name" class="form-control">
            <option value="">Select Company (or leave blank)</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="number_of_contacts">Number of Contacts:</label>
        <input type="number" name="number_of_contacts" id="number_of_contacts" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <!-- Dropdown untuk Departments -->
    <div class="form-group">
        <label for="departments">Departments:</label>
        <select class="form-control" id="departments" name="departments" required>
            <option value="Finance">Finance</option>
            <option value="Marketing">Marketing</option>
            <option value="Technology">Technology</option>
            <option value="Operations">Operations</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Legal">Legal</option>
        </select>
    </div>

    <!-- Dropdown untuk Investment Stage -->
    <div class="form-group">
        <label for="investment_stage">Investment Stage:</label>
        <select class="form-control" id="investment_stage" name="investment_stage">
            <option value="Seed">Seed</option>
            <option value="Series A">Series A</option>
            <option value="Series B">Series B</option>
            <option value="Series C">Series C</option>
            <option value="Growth">Growth</option>
            <option value="IPO">IPO</option>
        </select>
    </div>

    <hr>
    <h2>User Information</h2>
    <div class="form-group">
        <label for="nama_depan">First Name:</label>
        <input type="text" name="nama_depan" id="nama_depan" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama_belakang">Last Name:</label>
        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Investor</button>
</form>
@endsection
