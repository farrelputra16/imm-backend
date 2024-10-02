@extends('layouts.admin')

@section('css')

<style>
    /* Custom styling maintained from original code */
    .company-profile-container {
        display: flex;
    }

    .company-profile-wrapper {
        text-align: start;
        margin-bottom: 20px;
        margin-left: 50px;
        margin-top: 20px;
    }

    .company-profile {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #7b68ee;
    }

    .company-name h3 {
        margin: 0;
        margin-left: 50px;
        font-size: 1.5rem;
    }

    .custom-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        height: 50px;
        background-color: #7b68ee;
        color: #fff;
        border: solid 1px #7b68ee;
        font-size: 1rem;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        line-height: 30px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-bottom: 10px;
    }

    .custom-link:hover {
        background-color: #6a5acd;
    }

    .company-label .icon {
        margin-right: 8px;
        margin-left: 15px;
        font-size: 1.5rem;
        color: #6a5acd;
    }

    /* About and Highlights styling */
    .row-content {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .separator {
        height: 100%;
        width: 1px;
        background-color: #ccc;
        margin: 0 20px;
    }

    .col-section {
        flex: 1;
        padding: 20px;
    }

    .highlights-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .highlight-box {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .highlight-box:hover {
        transform: translateY(-5px);
    }

    .highlight-content {
        display: flex;
        flex-direction: column;
        text-align: left;
    }

    .highlight-content h5 {
        color: #6a5acd;
    }

    /* DataTables custom styling */
    table.dataTable th,
    table.dataTable td {
        white-space: nowrap;
    }

    table.dataTable tbody tr:hover {
        background-color: #f2f2f2;
        cursor: pointer;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 15px;
    }

    h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #4b6584;
    }

    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%; /* Ensures all cards have equal height */
    }

    .card-body {
        flex-grow: 1; /* Ensures card content grows and aligns properly */
        display: flex;
        flex-direction: column;
        justify-content: center; /* Centers the content vertically */
    }

    .mb-4 {
        margin-bottom: 1.5rem; /* Adds consistent margin below each card */
    }


    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .text-primary {
        color: #4b6584 !important;
    }

    .text-info:hover {
        text-decoration: underline;
        color: #29527b;
    }

    .fs-1 {
        font-size: 2rem;
    }
    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 15px;
    }

    h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #4b6584; /* Muted darker blue */
    }

    .card {
        background-color: #f9fafb; /* Slightly lighter background */
        border-radius: 20px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: #4b6584; /* Muted greyish-blue */
    }

    .card-text {
        font-size: 1rem;
        color: #747d8c; /* Muted text color */
    }

    .card-hover:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1); /* Softer hover effect */
    }

    .text-primary {
        color: #4b6584 !important; /* Muted darker blue */
    }

    .text-info {
        color: #17a2b8;
    }

    .text-info:hover {
        text-decoration: underline;
        color: #29527b; /* Softer transition */
    }

    .fs-1 {
        font-size: 2rem;
    } 
</style>
@endsection

@section('main-content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="company-profile-container d-flex align-items-center">
            <div class="company-profile-wrapper">
                <img class="company-profile" src="{{ asset('img/imm.ico') }}" alt="Company Profile Image">
            </div>
            <div class="company-name ms-3">
                <h3>{{ $company->nama }}</h3>
            </div>
        </div>

        <div class="row" style="padding-left: 50px;">
            <div class="col-sm-6">
                <div class="card-body">
                    <h4 class="card-title">About</h4>
                    <p class="card-text">{{ $company->startup_summary }}</p>
                </div>

                <div class="company-label">
                    <i class="bi bi-geo-alt icon"></i>
                    <a href="/search/organizations/location/new-york-new-york" class="location-link">{{ $company->negara }}</a>
                </div>

                <div class="company-label">
                    <i class="bi bi-globe icon"></i>
                    <a href="/search/organizations/location/united-states" class="location-link">{{ $company->profile }}</a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card-body">
                    <h4 class="card-title" style="padding-bottom: 10px;">Highlights</h4>
                    <div class="highlights-container">
                        <div class="row g-4" style="row-gap: 10px;">
                            <div class="col-6">
                                <!-- Highlight for Funds -->
                                <div class="highlight-box">
                                    <h6>Funds</h6>
                                    <h5>{{ $company->incomes->count() }}</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Highlight for Karyawan -->
                                <div class="highlight-box">
                                    <h6>Karyawan</h6>
                                    <h5>{{ $company->jumlah_karyawan }}</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Highlight for Total Funding -->
                                <div class="highlight-box">
                                    <h6>Total Funding</h6>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h5>{{ formatCurrency($company->total_funding) }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Highlight for Other Info -->
                                <div class="highlight-box">
                                    <h6>Investors</h6>
                                    <h5>{{ $company->incomes->count() }}</h5> <!-- Ganti dengan data yang relevan -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5" style="margin-right: 10px;">
            <h2 class="text-center mb-5 text-primary">Company Overview</h2>
            <div class="row g-4 align-items-stretch">
                <div class="col-md-4 d-flex mb-4">
                    <div class="card card-hover shadow-sm border-0 rounded-lg flex-grow-1 d-flex flex-column">
                        <div class="card-body text-center flex-grow-1">
                            <i class="bi bi-calendar2-date text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">Founded Date</h5>
                            <p class="card-text">{{ $company->founded_date }}</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4 d-flex mb-4" onclick="window.location.href='{{ route('companies.team', $company->id) }}'">
                    <div class="card card-hover shadow-sm border-0 rounded-lg flex-grow-1 d-flex flex-column">
                        <div class="card-body text-center flex-grow-1">
                            <i class="bi bi-people text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">Team</h5>
                            <p class="card-text">{{ $company->team }}</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4 d-flex mb-4">
                    <div class="card card-hover shadow-sm border-0 rounded-lg flex-grow-1 d-flex flex-column">
                        <div class="card-body text-center flex-grow-1">
                            <i class="bi bi-person-badge text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">PIC Info</h5>
                            <p class="card-text">{{ $company->nama_pic }} - {{ $company->posisi_pic }}</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4 d-flex mb-4">
                    <div class="card card-hover shadow-sm border-0 rounded-lg flex-grow-1 d-flex flex-column">
                        <div class="card-body text-center flex-grow-1">
                            <i class="bi bi-telephone text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">Phone</h5>
                            <p class="card-text">{{ $company->telepon }}</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4 d-flex mb-4">
                    <div class="card card-hover shadow-sm border-0 rounded-lg flex-grow-1 d-flex flex-column">
                        <div class="card-body text-center flex-grow-1">
                            <i class="bi bi-geo-alt text-primary fs-1 mb-3"></i>
                            <h5 class="card-title">City</h5>
                            <p class="card-text">{{ $company->kabupaten }},{{ $company->provinsi }},{{ $company->negara }}</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-4 d-flex mb-4">
                    <div class="card card-hover shadow-sm border-0 rounded-lg flex-grow-1 d-flex flex-column">
                        <div class="card-body text-center flex-grow-1">
                            <i class="fa fa-chart-pie text-primary fs-1 mb-3"></i> <!-- Ikon pie chart Font Awesome -->
                            <h5 class="card-title">Primary Sector</h5>
                            <p class="card-text">{{ $company->tipe }}</p>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        

        <div class="container mt-5" style="margin-right:20px;">
            <h2 class="text-center mb-5 text-primary">Income Overview</h2>

            <table id="incomeTable" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Fund</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company->incomes as $income)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $income->date }}</td>
                            <td>{{ $income->funding_type }}</td>
                            <td>{{ $income->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="container mt-5">
            <h2 class="text-center mb-5 text-primary">Project Overview</h2>
            <div class="section mt-5">
                <h4 class="text-center mb-5">Ongoing Projects ({{ $ongoingProjects->count() }})</h4>
                @if($ongoingProjects->isEmpty())
                    <p class="text-center">No ongoing projects found.</p>
                @else
                    <div class="row">
                        @foreach($ongoingProjects as $project)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="{{ $project->img ? asset('images/' . $project->img) : asset('img/imm.ico') }}" class="card-img-top" alt="Project Image">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="card-title">{{ $project->nama }}</h5>
                                                <p class="card-text">{{ Str::limit($project->deskripsi, 100) }}</p>
                                                <p><strong>Status:</strong> {{ $project->status }}</p>
                                            </div>
                                            <!-- Tombol View Detail -->
                                            <div class="ml-3">
                                                <a href="{{ route('metric-projects.index', $project->id) }}" class="btn btn-primary">View Detail</a>
                                            </div>
                                        </div>                                        
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="container mt-5" style="margin-bottom: 50px;">
                <div class="section mt-5">
                    <h4 class="text-center mb-5">Completed Projects ({{ $completedProjects->count() }})</h4>
                    @if($completedProjects->isEmpty())
                        <p class="text-center">No completed projects found.</p>
                    @else
                        <div class="row">
                            @foreach($completedProjects as $project)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img src="{{ $project->img ? asset('images/' . $project->img) : asset('images/default_project.png') }}" 
                                            class="card-img-top" alt="Project Image">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="card-title">{{ $project->nama }}</h5>
                                                    <p class="card-text">{{ Str::limit($project->deskripsi, 100) }}</p>
                                                    <p><strong>Status:</strong> {{ $project->status }}</p>
                                                </div>
                                                <!-- Tombol View Detail -->
                                                <div class="ml-3">
                                                    <a href="{{ route('metric-projects.index', $project->id) }}" class="btn btn-primary">View Detail</a>
                                                </div>
                                            </div>     
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@php
     function formatCurrency($amount) 
     {
        if ($amount >= 1_000_000) {
            // Juta
            return 'Rp ' . number_format($amount / 1_000_000, 2, ',', '.') . 'M';
        } elseif ($amount >= 1_000) {
            // Ribu
            return 'Rp ' . number_format($amount / 1_000, 2, ',', '.') . 'K';
        }
        // Kurang dari 1.000
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
@endphp
<script>
    $(document).ready(function() {
        $('#incomeTable').DataTable();
    });
</script>
@endsection
