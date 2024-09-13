@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">View Company</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $company->nama }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="profile">Profile:</label>
                <input type="text" class="form-control" id="profile" name="profile" value="{{ $company->profile }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="tipe">Tipe:</label>
                <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $company->tipe }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="nama_pic">Nama PIC:</label>
                <input type="text" class="form-control" id="nama_pic" name="nama_pic" value="{{ $company->nama_pic }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="posisi_pic">Posisi PIC:</label>
                <input type="text" class="form-control" id="posisi_pic" name="posisi_pic" value="{{ $company->posisi_pic }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $company->telepon }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="negara">Negara:</label>
                <input type="text" class="form-control" id="negara" name="negara" value="{{ $company->negara }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $company->provinsi }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="kabupaten">Kabupaten:</label>
                <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $company->kabupaten }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="jumlah_karyawan">Jumlah Karyawan:</label>
                <input type="text" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan" value="{{ $company->jumlah_karyawan }}" readonly>
            </div>
            <div class="form-group">
                <label for="user_id">User:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $company->user->nama_depan }} {{ $company->user->nama_belakang }}" readonly>
            </div>

            <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
