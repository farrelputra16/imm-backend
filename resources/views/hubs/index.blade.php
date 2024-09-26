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
                                    <a href="{{ route('hubs.edit', $hubsItem->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('hubs.destroy', $hubsItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
