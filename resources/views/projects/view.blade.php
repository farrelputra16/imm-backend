@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">View Project</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                @csrf

                <div class="form-group">
                    <label for="img">Gambar Project:</label><br>
                    @if (isset($project->img) && $project->img)
                        @php
                            $imgUrl = asset('images/' . $project->img);
                            $frontendImgUrl = env('APP_FRONTEND_URL') . '/images/' . $project->img;
                        @endphp
                        <img src="{{ file_exists(public_path('images/' . $project->img)) ? $imgUrl : $frontendImgUrl }}" height="200" width="auto">
                    @else
                        <img src="{{ env('APP_FRONTEND_URL') }}/images/default_project.png" height="200" width="auto">
                    @endif
                </div>

                <div class="form-group">
                    <label for="nama">Nama Project:</label>
                    <input type="text" class="form-control" id="nama" value="{{ $project->nama }}" readonly>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea class="form-control" id="deskripsi" rows="3" readonly>{{ $project->deskripsi }}</textarea>
                </div>

                <div class="form-group">
                    <label for="tujuan">Tujuan:</label>
                    <textarea class="form-control" id="tujuan" rows="3" readonly>{{ $project->tujuan }}</textarea>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="text" class="form-control" id="start_date" value="{{ $project->start_date }}" readonly>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="text" class="form-control" id="end_date" value="{{ $project->end_date }}" readonly>
                </div>

                <div class="form-group">
                    <label for="provinsi">Provinsi:</label>
                    <input type="text" class="form-control" id="provinsi" value="{{ $project->provinsi }}" readonly>
                </div>

                <div class="form-group">
                    <label for="kota">Kota:</label>
                    <input type="text" class="form-control" id="kota" value="{{ $project->kota }}" readonly>
                </div>

                <div class="form-group">
                    <label for="gmaps">Google Maps URL:</label>
                    <input type="text" class="form-control" id="gmaps" value="{{ $project->gmaps }}" readonly>
                </div>

                <div class="form-group">
                    <label for="jumlah_pendanaan">Jumlah Dana Keseluruhan:</label>
                    <input type="number" class="form-control" id="jumlah_pendanaan" value="{{ $project->jumlah_pendanaan }}" readonly>
                </div>

                <div class="form-group">
                    <div class="spesifikasi-pendanaan">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Jenis Dana</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project->dana as $index => $dana)
                                    <tr>
                                        <td>
                                            <select class="form-control" name="dana[{{ $index }}][jenis_dana]" readonly disabled>
                                                <option value="Hibah" {{ $dana->jenis_dana == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                                                <option value="Investasi" {{ $dana->jenis_dana == 'Investasi' ? 'selected' : '' }}>Investasi</option>
                                                <option value="Pinjaman" {{ $dana->jenis_dana == 'Pinjaman' ? 'selected' : '' }}>Pinjaman</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="dana[{{ $index }}][nominal]" value="{{ $dana->nominal }}" readonly>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <input type="text" class="form-control" id="company_id" value="{{ $project->company->nama }}" readonly>
                </div>

                <div class="form-group">
                    <label for="tags">Tags:</label><br>
                    @foreach ($project->tags as $tag)
                        <span class="badge badge-primary" style="font-size: 0.80vw;">{{ $tag->nama }}</span>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="sdgs">SDGs:</label><br>
                    @foreach($project->sdgs->sortBy('order') as $sdg)
                        <span class="badge badge-secondary" style="font-size: 0.80vw;">{{ $sdg->order }}. {{ $sdg->name }}</span>
                    @endforeach
                </div>
                
                <div class="form-group">
                    <label for="indicators">Indicators:</label><br>
                    @foreach ($project->indicators->sortBy('order') as $indicator)
                        <span class="badge badge-warning" style="font-size: 0.80vw;">{{ $indicator->order }} {{ $indicator->name }}</span>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="metrics">Metrics:</label><br>
                    @foreach ($project->metrics->sortBy('code') as $metric)
                        <span class="badge badge-info" style="font-size: 0.80vw;">({{ $metric->code }}) {{ $metric->name }}</span>
                    @endforeach
                </div>

                <h4>Target Pelanggan</h4>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Status Pekerjaan</th>
                                <th>Rentang Usia</th>
                                <th>Deskripsi Pelanggan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($project->targetPelanggan as $target)
                                <tr>
                                    <td><input type="text" class="form-control" value="{{ $target->status }}" readonly></td>
                                    <td><input type="text" class="form-control" value="{{ $target->rentang_usia }}" readonly></td>
                                    <td><input type="text" class="form-control" value="{{ $target->deskripsi_pelanggan }}" readonly></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
            <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@endsection
