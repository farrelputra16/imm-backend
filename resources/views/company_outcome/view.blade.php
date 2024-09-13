@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>View Company Outcome</h1>

    <div class="form-group">
        <label for="date">Date:</label>
        <p>{{ $companyOutcome->date }}</p>
    </div>

    <div class="form-group">
        <label for="jumlah_biaya">Jumlah Biaya:</label>
        <p>{{ $companyOutcome->jumlah_biaya }}</p>
    </div>
    <div class="form-group">
        <label for="category">Kategori:</label>
        <p>{{ $companyOutcome->category }}</p>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan:</label>
        <p>{{ $companyOutcome->keterangan }}</p>
    </div>

    <div class="form-group">
        <label for="bukti">Bukti:</label>
        @if ($companyOutcome->bukti)
            <p>
            @php
                $fileUrl = env('APP_FRONTEND_URL') . '/images/' . $companyOutcome->bukti;
                $backendFileUrl = asset('images/' . $companyOutcome->bukti);
            @endphp
                <a href="{{ file_exists(public_path('images/' . $companyOutcome->bukti)) ? $backendFileUrl : $fileUrl }}" target="_blank">
                    View File
                </a>
            </p>
        @else
            <p>No file uploaded.</p>
        @endif
    </div>

    <a href="{{ route('company-outcome.detail-outcome', ['project_id' => $companyOutcome->project_id]) }}" class="btn btn-primary">Back to Detail</a>
</div>
@endsection
