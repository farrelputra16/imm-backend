@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST" id="userForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="ADMIN" @if($user->role == 'ADMIN') selected @endif>Admin</option>
                        <option value="USER" @if($user->role == 'USER') selected @endif>User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_depan">Nama Depan:</label>
                    <input type="text" name="nama_depan" id="nama_depan" class="form-control" value="{{ $user->nama_depan }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang:</label>
                    <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="{{ $user->nama_belakang }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <!-- Additional fields for USER role -->
                <div id="userFields" style="display: none;">
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="text" name="nik" id="nik" class="form-control" value="{{ $user->nik }}" required>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara:</label>
                        <input type="text" name="negara" id="negara" class="form-control" value="{{ $user->negara }}" required>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi:</label>
                        <input type="text" name="provinsi" id="provinsi" class="form-control" value="{{ $user->provinsi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" class="form-control" required>{{ $user->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No Telepon:</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $user->telepon }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

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
