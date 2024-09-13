@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Company Outcome Detail</h1>

    <!-- Always show button to create new outcome -->
    @if (isset($outcome))
        <a href="{{ route('company-outcome.create', ['project_id' => $outcome->project_id]) }}" class="btn btn-primary mb-3">Add New Outcome</a>
    @else
        <a href="{{ route('company-outcome.create', ['project_id' => $project_id]) }}" class="btn btn-primary mb-3">Add New Outcome</a>
    @endif

    @if (isset($outcomes) && $outcomes->isNotEmpty())
        <!-- Display company outcome data -->
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Jumlah Biaya</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Bukti</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outcomes as $outcome)
                <tr>
                    <td>{{ $outcome->date }}</td>
                    <td>{{ $outcome->jumlah_biaya }}</td>
                    <td>{{ $outcome->category }}</td>
                    <td>{{ $outcome->keterangan }}</td>
                    <td>{{ $outcome->bukti }}</td>
                    <td>
                        {{-- View button --}}
                        <a href="{{ route('company-outcome.show', $outcome->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        
                        {{-- Edit button --}}
                        <a href="{{ route('company-outcome.edit', $outcome->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                        
                        {{-- Delete form --}}
                        <form action="{{ route('company-outcome.destroy', $outcome->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this outcome?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No outcome data available for this project.</p>
    @endif
</div>
@endsection
