@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1 class="h3 mb-2 text-gray-800">Edit Funding Round</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fundingrounds.update', $fundingRound->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="company_id">Company</label>
            <select name="company_id" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $fundingRound->company_id == $company->id ? 'selected' : '' }}>{{ $company->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Funding Round Name</label>
            <input type="text" name="name" class="form-control" value="{{ $fundingRound->name }}" required>
        </div>

        <div class="form-group">
            <label for="target">Target</label>
            <input type="number" name="target" class="form-control" value="{{ $fundingRound->target }}" required>
        </div>

        <div class="form-group">
            <label for="announced_date">Announced Date</label>
            <input type="date" name="announced_date" class="form-control" value="{{ $fundingRound->announced_date }}" required>
        </div>

        <div class="form-group">
            <label for="lead_investor_id">Lead Investor</label>
            <select name="lead_investor_id" class="form-control">
                @foreach ($investors as $investor)
                    <option value="{{ $investor->id }}" {{ $fundingRound->lead_investor_id == $investor->id ? 'selected' : '' }}>{{ $investor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="funding_stage">Funding Stage</label>
            <input type="text" name="funding_stage" class="form-control" value="{{ $fundingRound->funding_stage }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $fundingRound->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
