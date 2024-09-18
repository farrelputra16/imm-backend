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
                            <th>Location</th>
                            <th>Number of Organizations</th>
                            <th>Number of People</th>
                            <th>Number of Events</th>
                            <th>Rank</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hubs as $hub)
                            <tr>
                                <td>{{ $hub->name }}</td>
                                <td>{{ $hub->location }}</td>
                                <td>{{ $hub->number_of_organizations }}</td>
                                <td>{{ $hub->number_of_people }}</td>
                                <td>{{ $hub->number_of_events }}</td>
                                <td>{{ $hub->rank }}</td>
                                <td>
                                    <a href="{{ route('hubs.edit', $hub->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('hubs.destroy', $hub->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('hubs.show', $hub->id) }}" class="btn btn-sm btn-info">View</a>
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
