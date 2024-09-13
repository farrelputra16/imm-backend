@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Edit Company Income</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('company-income.update', $income->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $income->date) }}" required>
        </div>
        <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" name="pengirim" id="pengirim" class="form-control" value="{{ old('pengirim', $income->pengirim) }}" required>
        </div>
        <div class="form-group">
            <label for="bank_asal">Bank Asal</label>
            <input type="text" name="bank_asal" id="bank_asal" class="form-control" value="{{ old('bank_asal', $income->bank_asal) }}" required>
        </div>
        <div class="form-group">
            <label for="bank_tujuan">Bank Tujuan</label>
            <input type="text" name="bank_tujuan" id="bank_tujuan" class="form-control" value="{{ old('bank_tujuan', $income->bank_tujuan) }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah_hibah">Jumlah Hibah</label>
            <input type="number" name="jumlah_hibah" id="jumlah_hibah" class="form-control" value="{{ old('jumlah_hibah', $income->jumlah_hibah) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Income</button>
    </form>
</div>
@endsection
