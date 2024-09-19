@extends('layouts.admin')

@section('main-content')
<h1>Create New Investor</h1>

<form action="{{ route('investors.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="org_name">Organization Name:</label>
        <input type="text" name="org_name" id="org_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="number_of_contacts">Number of Contacts:</label>
        <input type="number" name="number_of_contacts" id="number_of_contacts" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="number_of_investments">Number of Investments:</label>
        <input type="number" name="number_of_investments" id="number_of_investments" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="departments">Departments:</label>
        <input type="text" name="departments" id="departments" class="form-control" required>
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
