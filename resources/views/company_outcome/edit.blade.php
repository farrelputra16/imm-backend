@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Edit Company Outcome</h1>

    <form action="{{ route('company-outcome.update', $companyOutcome->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $companyOutcome->date) }}">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jumlah_biaya">Jumlah Biaya</label>
            <input type="number" class="form-control" id="jumlah_biaya" name="jumlah_biaya" value="{{ old('jumlah_biaya', $companyOutcome->jumlah_biaya) }}">
            @error('jumlah_biaya')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Kategori</label>
            <textarea class="form-control" id="category" name="category">{{ old('category', $companyOutcome->category) }}</textarea>
            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan', $companyOutcome->keterangan) }}</textarea>
            @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="bukti">Bukti</label>
            <input type="file" class="form-control" id="bukti" name="bukti">
            @if ($companyOutcome->bukti)
                <p>Current file: 
                    @php
                    $fileUrl = env('APP_FRONTEND_URL') . '/images/' . $companyOutcome->bukti;
                    $backendFileUrl = asset('images/' . $companyOutcome->bukti);
                @endphp
                    <a href="{{ file_exists(public_path('images/' . $companyOutcome->bukti)) ? $backendFileUrl : $fileUrl }}" target="_blank">{{ $companyOutcome->bukti }}</a>
                    </p>
                @endif
            @error('bukti')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_id">Project</label>
            <select class="form-control" id="project_id" name="project_id" disabled>
                <option value="{{ $companyOutcome->project->id }}" selected>{{ $companyOutcome->project->nama }}</option>
            </select>
            <input type="hidden" name="project_id" value="{{ $companyOutcome->project->id }}">
            @error('project_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
