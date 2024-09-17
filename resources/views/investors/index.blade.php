@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Investor List</h1>
        <a href="{{ route('investors.create') }}" class="btn btn-primary mb-3">Create New Investor</a>
        @if ($investors->isEmpty())
            <p>No investors found.</p>
        @else
            <table id="investors-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Organization Name</th>
                        <th>Number of Contacts</th>
                        <th>Number of Investments</th>
                        <th>Location</th>
                        <th>Departments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($investors as $investor)
                        <tr>
                            <td>{{ $investor->org_name }}</td>
                            <td>{{ $investor->number_of_contacts }}</td>
                            <td>{{ $investor->number_of_investments }}</td>
                            <td>{{ $investor->location }}</td>
                            <td>{{ $investor->departments }}</td>
                            <td style="width:100%;">
                                <a href="{{ route('investors.view', $investor->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-info-circle" style="color: #ffffff;"></i>
                                </a>
                                <a href="{{ route('investors.edit', $investor->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt" style="color: #ffffff;"></i>
                                </a>
                                <form action="{{ route('investors.destroy', $investor->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this investor?')">
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
            $('#investors-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
