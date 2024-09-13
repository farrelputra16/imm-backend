@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>SDG List</h1>
        <a href="{{ route('sdgs.create') }}" class="btn btn-primary mb-3">Create New SDG</a>
        @if ($sdgs->isEmpty())
            <p>No SDG found.</p>
        @else
            <table id="sdgs-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sdgs as $sdg)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $sdg->img) }}" height="50" width="50">
                            </td>
                            <td style="width:70%;">{{ $sdg->name }}</td>
                            <td>{{ $sdg->order }}</td>
                            <td>{{ $sdg->description }}</td>

                            <td style="width:100%;">
                                <a href="{{ route('sdgs.view', $sdg->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                                <a href="{{ route('sdgs.edit', $sdg->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-pencil-alt" style="color: #ffffff;"></i></a>
                                <form action="{{ route('sdgs.destroy', $sdg->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this SDG?')">
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
            $('#sdgs-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
