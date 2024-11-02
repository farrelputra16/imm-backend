@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Funding Round Details</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Company</th>
                        <td>{{ $fundingRound->company->nama }}</td>
                    </tr>
                    <tr>
                        <th>Funding Round Name</th>
                        <td>{{ $fundingRound->name }}</td>
                    </tr>
                    <tr>
                        <th>Target</th>
                        <td>{{ number_format($fundingRound->target, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Money Raised</th>
                        <td>{{ number_format($fundingRound->money_raised ?? 0, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Lead Investor</th>
                        <td>{{ optional($fundingRound->leadInvestor)->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Funding Stage</th>
                        <td>{{ ucfirst($fundingRound->funding_stage) }}</td>
                    </tr>
                    <tr>
                        <th>Announced Date</th>
                        <td>{{ \Carbon\Carbon::parse($fundingRound->announced_date)->format('d M, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $fundingRound->description ?? 'No description available.' }}</td>
                    </tr>
                </table>

                <a href="{{ route('fundingrounds.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('fundingrounds.edit', $fundingRound->id) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('fundingrounds.destroy', $fundingRound->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this funding round?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
