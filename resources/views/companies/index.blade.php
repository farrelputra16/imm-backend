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
    th:nth-child(1), td:nth-child(1) { width: 20%; } /* Profile column */
    th:nth-child(2), td:nth-child(2) { width: 15%; } /* Founded Date */
    th:nth-child(3), td:nth-child(3) { width: 10%; } /* Type */
    th:nth-child(4), td:nth-child(4) { width: 10%; } /* PIC Name */
    th:nth-child(5), td:nth-child(5) { width: 10%; } /* PIC Position */
    th:nth-child(6), td:nth-child(6) { width: 10%; } /* Phone */
    th:nth-child(7), td:nth-child(7) { width: 20%; } /* SDG */

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
            <table id="companies-table" class="table table-hover table-striped" style="margin-bottom: 0;">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Tanggal Didirikan</th>
                        <th>Tipe</th>
                        <th>Nama PIC</th>
                        <th>Posisi PIC</th>
                        <th>Telepon</th>
                        <th>SDG</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>
                                <div>
                                    <img src="{{ !empty($company->image) ? asset($company->image) : asset('images/logo-maxy.png') }}" alt="" width="50" height="50">
                                    <span>{{ $company->nama }}</span>
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($company->founded_date)->format('j M, Y') }}</td>
                            <td>{{ $company->tipe }}</td>
                            <td>{{ $company->nama_pic }}</td>
                            <td>{{ $company->posisi_pic }}</td>
                            <td>{{ $company->telepon }}</td>
                            <td>
                                @foreach($sdg_projects as $sdg)
                                    <div class="sdg-tag">
                                        <h5 style="margin: 0;">SDG {{ $sdg->id }}</h5>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('companies.view', $company->id) }}" class="btn btn-sm btn-primary btn-action">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary btn-action">
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
