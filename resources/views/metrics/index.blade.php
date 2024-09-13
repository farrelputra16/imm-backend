@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Metric List</h1>
        <a href="{{ route('metrics.create') }}" class="btn btn-primary mb-3">Create New Metric</a>

        @if ($metrics->isEmpty())
            <p>No metric found.</p>
        @else
            <div class="table-responsive">
                <table id="metrics-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Definition (Optional)</th>
                            <th>Tags</th>
                            <th>Indicators</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($metrics as $metric)
                            <tr>
                                <td>{{ $metric->code }}</td>
                                <td>
                                    <div
                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ $metric->name }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        {{ $metric->definition ?? 'N/A' }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        @foreach ($metric->tags as $tag)
                                            {{ $tag->nama }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div
                                        style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        @foreach ($metric->indicators as $indicator)
                                            {{ $indicator->name }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('metrics.view', $metric->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-info-circle" style="color: #ffffff;"></i></a>
                                    <a href="{{ route('metrics.edit', $metric->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-pencil-alt" style="color: #ffffff;"></i></a>
                                    <form action="{{ route('metrics.destroy', $metric->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this metric?')">
                                            <i class="fas fa-trash" style="color: #ffffff;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#metrics-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
