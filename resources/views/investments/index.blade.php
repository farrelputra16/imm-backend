@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pengajuan Investasi</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Investor</th>
                            <th>Perusahaan</th>
                            <th>Proyek</th>
                            <th>Jumlah Investasi</th>
                            <th>Tanggal Investasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($investments as $investment)
                            <tr>
                                <td>{{ $investment->investor->org_name }}</td>
                                <td>{{ $investment->company->nama }}</td>
                                <td>{{ $investment->project->nama }}</td>
                                <td>{{ number_format($investment->amount, 2) }}</td>
                                <td>{{ $investment->investment_date }}</td>
                                <td>
                                    @if ($investment->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($investment->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif ($investment->status == 'rejected')
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol Approve dan Reject hanya jika status pending -->
                                    @if ($investment->status == 'pending')
                                        <form action="{{ route('investments.approve', $investment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui investasi ini?')">Approve</button>
                                        </form>
                                        <form action="{{ route('investments.reject', $investment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak investasi ini?')">Reject</button>
                                        </form>
                                    @endif

                                    <!-- Tombol Edit, Delete, dan View -->
                                    <a href="{{ route('investments.edit', $investment->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('investments.destroy', $investment->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus investasi ini?')">Delete</button>
                                    </form>
                                    <a href="{{ route('investments.show', $investment->id) }}" class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
