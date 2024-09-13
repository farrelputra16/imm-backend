@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Add New Company Income for {{ $company->nama }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('company-income.store') }}" method="POST">
        @csrf
        <input type="hidden" name="company_id" value="{{ $company->id }}">
        
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
        </div>
        <div class="form-group">
            <label for="pengirim">Sender</label>
            <input type="text" name="pengirim" id="pengirim" class="form-control" value="{{ old('pengirim') }}" required>
        </div>
        <div class="form-group">
            <label for="bank_asal">Source Bank</label>
            <input type="text" name="bank_asal" id="bank_asal" class="form-control" value="{{ old('bank_asal') }}" required>
        </div>
        <div class="form-group">
            <label for="bank_tujuan">Destination Bank</label>
            <input type="text" name="bank_tujuan" id="bank_tujuan" class="form-control" value="{{ old('bank_tujuan') }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah_hibah">Grant Amount</label>
            <input type="number" name="jumlah_hibah" id="jumlah_hibah" class="form-control" value="{{ old('jumlah_hibah') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Income</button>
    </form>
</div>
@endsection
