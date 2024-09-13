@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('User') }}</h1>

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

    <!-- User Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create New User</h1>

    <!-- Form for creating a new user -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST" id="userForm">
                @csrf
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="ADMIN">Admin</option>
                        <option value="USER">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_depan">Nama Depan:</label>
                    <input type="text" name="nama_depan" id="nama_depan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang:</label>
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

                <!-- Additional fields for USER role -->
                <div id="userFields" style="display: none;">
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="text" name="nik" id="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara:</label>
                        <input type="text" name="negara" id="negara" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi:</label>
                        <input type="text" name="provinsi" id="provinsi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No Telepon:</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

</div>

<!-- JavaScript to handle form fields based on role selection -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role');
        const userFields = document.getElementById('userFields');
        const userForm = document.getElementById('userForm');

        // Function to show or hide fields based on role selection
        function toggleFields() {
            if (roleSelect.value === 'USER') {
                userFields.style.display = 'block';
                // Set required attribute to additional fields for USER role
                document.querySelectorAll('#userFields [required]').forEach(function(field) {
                    field.setAttribute('required', '');
                });
            } else {
                userFields.style.display = 'none';
                // Remove required attribute from additional fields for ADMIN role
                document.querySelectorAll('#userFields [required]').forEach(function(field) {
                    field.removeAttribute('required');
                });
            }
        }

        // Initial state
        toggleFields();

        // Event listener for role selection change
        roleSelect.addEventListener('change', toggleFields);

        // Event listener for form submission
        userForm.addEventListener('submit', function(event) {
            // If role is ADMIN, remove required attribute from additional fields
            if (roleSelect.value === 'ADMIN') {
                document.querySelectorAll('#userFields [required]').forEach(function(field) {
                    field.removeAttribute('required');
                });
            }
        });
    });
</script>

@endsection
