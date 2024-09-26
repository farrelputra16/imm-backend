@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Hubs</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="{{ route('hubs.create') }}" class="btn btn-primary mb-3">Create New Hub</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Rank</th>
                            <th>Status</th> <!-- Kolom Status -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hubs as $hubsItem)
                            <tr>
                                <td>{{ $hubsItem->name }}</td>
                                <td>{{ $hubsItem->provinsi }}</td>
                                <td>{{ $hubsItem->kota }}</td>
                                <td>{{ $hubsItem->rank }}</td>
                                <td>
                                    @if ($hubsItem->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($hubsItem->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif ($hubsItem->status == 'rejected')
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol Approve dan Reject hanya jika status pending -->
                                    @if ($hubsItem->status == 'pending')
                                        <form action="{{ route('hubs.approve', $hubsItem->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui hub ini?')">Approve</button>
                                        </form>
                                        <form action="{{ route('hubs.reject', $hubsItem->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak hub ini?')">Reject</button>
                                        </form>
                                    @endif

                                    <!-- Tombol Edit, Delete, dan View -->
                                    <a href="{{ route('hubs.edit', $hubsItem->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('hubs.destroy', $hubsItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus hub ini?')">Delete</button>
                                    </form>
                                    <a href="{{ route('hubs.show', $hubsItem->id) }}" class="btn btn-sm btn-info">View</a>
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
