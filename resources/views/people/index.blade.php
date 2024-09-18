@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>People List</h1>
        <a href="{{ route('people.create') }}" class="btn btn-primary mb-3">Create New People</a>
        @if ($people->isEmpty())
            <p>No people found.</p>
        @else
            <table id="people-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Primary Job Title</th>
                        <th>Primary Organization</th>
                        <th>Location</th>
                        <th>Regions</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Gmail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->name }}</td>
                            <td>{{ ucfirst($person->role) }}</td>
                            <td>{{ $person->primary_job_title }}</td>
                            <td>{{ $person->primary_organization }}</td>
                            <td>{{ $person->location }}</td>
                            <td>{{ $person->regions }}</td>
                            <td>{{ ucfirst($person->gender) }}</td>
                            <td>{{ $person->phone_number }}</td>
                            <td>{{ $person->gmail }}</td>
                            <td style="width:100%;">
                                <a href="{{ route('people.view', $person->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-info-circle" style="color: #ffffff;"></i>
                                </a>
                                <a href="{{ route('people.edit', $person->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt" style="color: #ffffff;"></i>
                                </a>
                                <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this person?')">
                                        <i class="fas fa-trash" style="color: #ffffff;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#people-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
