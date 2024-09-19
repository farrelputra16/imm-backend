@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Create New User') }}</h1>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="role">Role:</label>
        <select name="role" id="role" class="form-control">
            <option value="ADMIN">Admin</option>
            <option value="USER">User</option>
            <option value="PEOPLE">People</option>
            <option value="INVESTOR">Investor</option>
            <option value="EVENT_ORGANIZER">Event Organizer</option>
        </select>
    </div>

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

    <!-- Additional fields for USER and PEOPLE role -->
    <div id="userFields" style="display: none;">
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" class="form-control">
        </div>
        <div class="form-group">
            <label for="negara">Country:</label>
            <input type="text" name="negara" id="negara" class="form-control">
        </div>
        <div class="form-group">
            <label for="provinsi">Province:</label>
            <input type="text" name="provinsi" id="provinsi" class="form-control">
        </div>
        <div class="form-group">
            <label for="alamat">Address:</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="telepon">Phone Number:</label>
            <input type="text" name="telepon" id="telepon" class="form-control">
        </div>
    </div>

    <!-- Additional fields for INVESTOR role -->
    <div id="investorFields" style="display: none;">
        <div class="form-group">
            <label for="org_name">Organization Name:</label>
            <input type="text" name="org_name" id="org_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="number_of_contacts">Number of Contacts:</label>
            <input type="number" name="number_of_contacts" id="number_of_contacts" class="form-control">
        </div>
        <div class="form-group">
            <label for="number_of_investments">Number of Investments:</label>
            <input type="number" name="number_of_investments" id="number_of_investments" class="form-control">
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="departments">Departments:</label>
            <input type="text" name="departments" id="departments" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create User</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const userFields = document.getElementById('userFields');
        const investorFields = document.getElementById('investorFields');

        roleSelect.addEventListener('change', function () {
            if (roleSelect.value === 'INVESTOR') {
                investorFields.style.display = 'block';
            } else {
                investorFields.style.display = 'none';
            }

            if (roleSelect.value === 'USER' || roleSelect.value === 'PEOPLE') {
                userFields.style.display = 'block';
            } else {
                userFields.style.display = 'none';
            }
        });
    });
</script>

@endsection
