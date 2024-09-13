<!-- resources/views/categories/create.blade.php -->
@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Company') }}</h1>

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

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create New Company</h1>

    <!-- Form for creating a new category -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                    <label for="profile">Profile:</label>
                    <input type="text" class="form-control" id="profile" name="profile" required>
                    <label for="tipe">Tipe:</label>
                    <input type="text" class="form-control" id="tipe" name="tipe" required>
                    <label for="nama_pic">Nama PIC:</label>
                    <input type="text" class="form-control" id="nama_pic" name="nama_pic" required>
                    <label for="posisi_pic">Posisi PIC:</label>
                    <input type="text" class="form-control" id="posisi_pic" name="posisi_pic" required>
                    <label for="telepon">Telepon:</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                    <label for="negara">Negara:</label>
                    <input type="text" class="form-control" id="negara" name="negara" required>
                    <label for="provinsi">Provinsi:</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    <label for="kabupaten">Kabupaten:</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
                    <label for="jumlah_karyawan">Jumlah Karyawan:</label>
                    <input type="text" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan" required>

                    <!-- Dropdown for user_id -->
                    <label for="user_id">User:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nama_depan }} {{ $user->nama_belakang }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Company</button>
            </form>
        </div>
    </div>

</div>

@endsection
