@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Company</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $company->nama }}" required>
                    <label for="profile">Profile:</label>
                    <input type="text" class="form-control" id="profile" name="profile" value="{{ $company->profile }}" required>
                    <label for="tipe">Tipe:</label>
                    <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $company->tipe }}" required>
                    <label for="nama_pic">Nama PIC:</label>
                    <input type="text" class="form-control" id="nama_pic" name="nama_pic" value="{{ $company->nama_pic }}" required>
                    <label for="posisi_pic">Posisi PIC:</label>
                    <input type="text" class="form-control" id="posisi_pic" name="posisi_pic" value="{{ $company->posisi_pic }}" required>
                    <label for="telepon">Telepon:</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $company->telepon }}" required>
                    <label for="negara">Negara:</label>
                    <input type="text" class="form-control" id="negara" name="negara" value="{{ $company->negara }}" required>
                    <label for="provinsi">Provinsi:</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $company->provinsi }}" required>
                    <label for="kabupaten">Kabupaten:</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $company->kabupaten }}" required>
                    <label for="jumlah_karyawan">Jumlah Karyawan:</label>
                    <input type="text" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan" value="{{ $company->jumlah_karyawan }}" required>

                    <!-- Dropdown for user_id -->
                    <label for="user_id">User:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($user->id === $company->user_id) selected @endif>
                                {{ $user->nama_depan }} {{ $user->nama_belakang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Company</button>
            </form>
        </div>
    </div>
</div>
@endsection
