@extends('layouts.admin')

@section('main-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Users</h1>

        <!-- Create Button -->
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New User</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="users-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->fullName }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('users.view', $user->id) }}" class="btn btn-primary"><i
                                                class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i
                                                class="fas fa-pencil-alt" style="color: #ffffff;"></i></a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fas fa-trash" style="color: #ffffff;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
