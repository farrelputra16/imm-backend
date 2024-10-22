@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Funding Rounds</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Funding Round Name</th>
                            <th>Target</th>
                            <th>Money Raised</th>
                            <th>Lead Investor</th>
                            <th>Funding Stage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fundingRounds as $fundingRound)
                            <tr>
                                <td>{{ $fundingRound->company->nama }}</td>
                                <td>{{ $fundingRound->name }}</td>
                                <td>{{ number_format($fundingRound->target, 2) }}</td>
                                <td>{{ number_format($fundingRound->money_raised ?? 0, 2) }}</td>
                                <td>{{ optional($fundingRound->leadInvestor)->name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($fundingRound->funding_stage) }}</td>
                                <td>
                                    <a href="{{ route('fundingrounds.show', $fundingRound->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('fundingrounds.edit', $fundingRound->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('fundingrounds.destroy', $fundingRound->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this funding round?')">Delete</button>
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
@endsection
