@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit People</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('people.update', $people->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <h5>User Information</h5>
                    <label for="nama_depan">First Name:</label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $people->user->nama_depan }}" required>

                    <label for="nama_belakang">Last Name:</label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $people->user->nama_belakang }}" required>

                    <label for="gmail">Email (Gmail):</label>
                    <input type="email" class="form-control" id="gmail" name="gmail" value="{{ $people->user->email }}" required>

                    <label for="password">Password (Leave blank to keep current):</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <h5>People Information</h5>
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $people->name }}" required>

                    <label for="role">Role:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="mentor" @if($people->role === 'mentor') selected @endif>Mentor</option>
                        <option value="pekerja" @if($people->role === 'pekerja') selected @endif>Pekerja</option>
                        <option value="konsultan" @if($people->role === 'konsultan') selected @endif>Konsultan</option>
                    </select>

                    <label for="primary_job_title">Primary Job Title:</label>
                    <input type="text" class="form-control" id="primary_job_title" name="primary_job_title" value="{{ $people->primary_job_title }}" required>

                    <label for="primary_organization">Primary Organization:</label>
                    <select class="form-control" id="primary_organization" name="primary_organization">
                        <option value="">-- Select a Company (optional) --</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" @if($people->primary_organization == $company->id) selected @endif>
                                {{ $company->nama }}
                            </option>
                        @endforeach
                    </select>

                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $people->location }}" required>

                    <label for="regions">Regions:</label>
                    <input type="text" class="form-control" id="regions" name="regions" value="{{ $people->regions }}" required>

                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Laki-laki" @if($people->gender === 'Laki-laki') selected @endif>Male</option>
                        <option value="Perempuan" @if($people->gender === 'Perempuan') selected @endif>Female</option>
                    </select>

                    <label for="linkedin_link">LinkedIn Link:</label>
                    <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ $people->linkedin_link }}">

                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $people->description }}</textarea>

                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $people->phone_number }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update People</button>
            </form>
        </div>
    </div>
</div>
@endsection
