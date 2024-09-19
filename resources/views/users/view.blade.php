@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail User</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form id="userForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control" disabled>
                        <option value="ADMIN" @if($user->role == 'ADMIN') selected @endif>Admin</option>
                        <option value="USER" @if($user->role == 'USER') selected @endif>User</option>
                        <option value="PEOPLE" @if($user->role == 'PEOPLE') selected @endif>People</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_depan">Nama Depan:</label>
                    <input type="text" name="nama_depan" id="nama_depan" class="form-control" value="{{ $user->nama_depan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang:</label>
                    <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="{{ $user->nama_belakang }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>

                <!-- Additional fields for USER and PEOPLE role -->
                <div id="userFields" style="display: none;">
                    <div class="form-group">
                        <label for="nik">NIK:</label>
                        <input type="text" name="nik" id="nik" class="form-control" value="{{ $user->nik }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara:</label>
                        <input type="text" name="negara" id="negara" class="form-control" value="{{ $user->negara }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi:</label>
                        <input type="text" name="provinsi" id="provinsi" class="form-control" value="{{ $user->provinsi }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" class="form-control" readonly>{{ $user->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No Telepon:</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $user->telepon }}" readonly>
                    </div>
                </div>

                <!-- Additional fields for PEOPLE role -->
                <div id="peopleFields" style="display: none;">
                    <div class="form-group">
                        <label for="primary_job_title">Job Title:</label>
                        <input type="text" name="primary_job_title" id="primary_job_title" class="form-control" value="{{ optional($user->people)->primary_job_title }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="primary_organization">Organization:</label>
                        <input type="text" name="primary_organization" id="primary_organization" class="form-control" value="{{ optional($user->people)->primary_organization }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ optional($user->people)->location }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="regions">Regions:</label>
                        <input type="text" name="regions" id="regions" class="form-control" value="{{ optional($user->people)->regions }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" name="gender" id="gender" class="form-control" value="{{ optional($user->people)->gender }}" readonly>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('users.index') }}'">Back</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role');
        const userFields = document.getElementById('userFields');
        const peopleFields = document.getElementById('peopleFields');

        // Function to show or hide fields based on role selection
        function toggleFields() {
            const role = roleSelect.value;
            if (role === 'USER' || role === 'PEOPLE') {
                userFields.style.display = 'block';
            } else {
                userFields.style.display = 'none';
            }

            if (role === 'PEOPLE') {
                peopleFields.style.display = 'block';
            } else {
                peopleFields.style.display = 'none';
            }
        }

        // Initial state
        toggleFields();
    });
</script>
@endsection
