@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Departments</h1>
        <a href="{{ route('departments.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Create Department</a>
        @if ($departments->isEmpty())
            <p>No department found.</p>
        @else
            <table id="departments-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>
                                <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('departments.destroy', $department) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
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
            $('#departments-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection