@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}

<style>
    body {
        background-color: #f8f9fa; /* Light gray background for the entire page */
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }

    /* Center all table headers */
    .table-responsive thead th {
        background-color: #6f42c1 !important; /* Header background color */
        color: white !important; /* Header text color */
        text-align: center; /* Center the header text */
    }

    /* Custom width for columns */
    th:nth-child(1), td:nth-child(1) { width: 10%; } /* Profile column */
    th:nth-child(2), td:nth-child(2) { width: 5%; } /* Founded Date */
    th:nth-child(3), td:nth-child(3) { width: 10%; } /* Type */
    th:nth-child(4), td:nth-child(4) { width: 10%; } /* PIC Name */
    th:nth-child(5), td:nth-child(5) { width: 10%; } /* PIC Position */
    th:nth-child(6), td:nth-child(6) { width: 5%; } /* Phone */
    th:nth-child(7), td:nth-child(7) { width: 15%; } /* SDG */
    th:nth-child(8), td:nth-child(8) { width: 15%; } /* Actions */

    /* Set background color for table body rows */
    .table tbody tr {
        background-color: white; /* White background for table rows */
    }

    td {
        vertical-align: middle; /* Ensures cell content is vertically centered */
        border-bottom: none; /* Remove bottom border from cells */
    }

    /* Specific rule to remove bottom border from the table */
    .table {
        border: none; /* Remove all borders */
    }

    .table th {
        border-bottom: none; /* Remove bottom border from header */
    }

    td:last-child {
        display: flex; /* Use flexbox for button arrangement */
        justify-content: center; /* Center the buttons */
        align-items: center; /* Vertically center */
        padding: 0; /* Remove extra padding if necessary */
    }

    .btn-action {
        margin: 0 5px; /* Spacing between buttons */
    }

    .sdg-tag {
        display: inline-flex;
        background-color: #594eb8;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
        margin: 5px;
        font-size: 14px;
    }
</style>
@endsection

@section('main-content')
<div class="container">
    <h1>Company List</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Create New Company</a>
    @if ($companies->isEmpty())
        <p>No company found.</p>
    @else
        <div class="table-responsive">
            <table id="companies-table" class="table table-hover table-striped" style="margin-bottom: 0px;">
                <thead>
                    <tr>
                        <th scope="col" style="vertical-align: middle;">Profile</th>
                        <th scope="col" style="vertical-align: middle;">Nama</th>
                        <th scope="col" style="vertical-align: middle;">Tanggal Didirikan</th>
                        <th scope="col" style="vertical-align: middle;">Business Model</th>
                        <th scope="col" style="vertical-align: middle;">Nama PIC</th>
                        <th scope="col" style="vertical-align: middle;">Posisi PIC</th>
                        <th scope="col" style="vertical-align: middle;">Telepon</th>
                        <th scope="col" style="vertical-align: middle;">SDG</th>
                        <th scope="col" style="vertical-align: middle;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td style="vertical-align: middle;">
                                <div style="display: flex; align-items: center;">
                                    <div style="margin-right: 5px;">
                                        <img src="{{ !empty($company->profile) ? asset($company->profile) : asset('images/logo-maxy.png') }}" alt="" width="50" height="50" style="border-radius: 8px; object-fit:cover;">
                                    </div>
                                    <div style="flex-grow: 1; margin-left: 0px; margin-right: 0px; width: 100px; word-wrap: break-word; word-break: break-word; white-space: normal;"
                                        @if (strlen($company->nama) > 20)
                                            title="{{ $company->nama }}"
                                            style="cursor: pointer;"
                                        @endif
                                    >
                                        <span>{{ $company->nama }}</span>
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align: middle;">{{ $company->nama }}</td>
                            <td style="vertical-align: middle;">{{ $company->founded_date ? \Carbon\Carbon::parse($company->founded_date)->format('j M, Y') : 'N/A' }}</td>
                            <td style="vertical-align: middle;">{{ $company->business_model }}</td>
                            <td style="vertical-align: middle;">{{ $company->nama_pic }}</td>
                            <td style="vertical-align: middle;">{{ $company->posisi_pic }}</td>
                            <td style="vertical-align: middle;">{{ $company->telepon }}</td>
                            <td style="vertical-align: middle;">
                                @foreach($sdg_projects as $sdg)
                                    <div class="sdg-tag">
                                        <h5 style="margin: 0;">SDG {{ $sdg->id }}</h5>
                                    </div>
                                @endforeach
                            </td>
                            <td style="vertical-align: middle; display: flex; align-items: center; justify-content: center;">
                                <a href="{{ route('companies.view', $company->id) }}" class="btn btn-sm btn-primary btn-action" style="margin-right: 5px;">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary btn-action" style="margin-right: 5px;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this company?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849iQ6sI4Cz6G8KY+klcqJj9f+ZLfN9t/D4V4tTt55Z4Yt4bG2Qj55sKyh1" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#companies-table').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
