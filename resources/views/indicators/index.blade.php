@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Indicator List</h1>
        <a href="{{ route('indicators.create') }}" class="btn btn-primary mb-3">Create New Indicator</a>
        @if ($indicators->isEmpty())
            <p>No indicator found.</p>
        @else
            <table id="indicators-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Order</th>
                        <th>Level</th>
                        <th>Parent Indicator</th>
                        <th>SDG</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($indicators as $indicator)
                        <tr>
                            <td>{{ $indicator->name }}</td>
                            <td>{{ $indicator->order }}</td>
                            <td>{{ $indicator->level }}</td>
                            <td>{{ $indicator->parentIndicator ? $indicator->parentIndicator->id : 'None' }}</td>
                            <td>{{ $indicator->sdg_id }}</td>
                            <td>{{ $indicator->description }}</td>
                            <td style="width:100%;">
                                <a href="{{ route('indicators.view', $indicator->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                                <a href="{{ route('indicators.edit', $indicator->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-pencil-alt" style="color: #ffffff;"></i></a>
                                <form action="{{ route('indicators.destroy', $indicator->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this Indicator?')">
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
            $('#indicators-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
