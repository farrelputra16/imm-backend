@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Company Income Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Income Details</h5>
            <p><strong>Date:</strong> {{ $income->date }}</p>
            <p><strong>Pengirim:</strong> {{ $income->pengirim }}</p>
            <p><strong>Bank Asal:</strong> {{ $income->bank_asal }}</p>
            <p><strong>Bank Tujuan:</strong> {{ $income->bank_tujuan }}</p>
            <p><strong>Jumlah:</strong> {{ $income->jumlah }}</p>
            <p><strong>Funding Type:</strong> {{ $income->funding_type }}</p>
            <p><strong>Tipe Investasi:</strong> 
                @if ($income->tipe_investasi)
                    $income->tipe_investasi
                @else
                    Tidak ada tipe investasi
                @endif
            </p>
        </div>
    </div>
    <a href="{{ route('company-income.index', ['company_id' => $income->company_id]) }}" class="btn btn-primary mt-3">Back</a>
</div>
@endsection
