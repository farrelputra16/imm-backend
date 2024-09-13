@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Create New Metric Project for Project: {{ $project->nama }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('metric-projects.store', $project->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="metric_id">Select Metric</label>
            <select name="metric_id" id="metric_id" class="form-control">
                @foreach ($metrics as $metric)
                    <option value="{{ $metric->id }}">{{ $metric->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="value">Value</label>
            <input type="text" name="value" id="value" class="form-control" value="{{ old('value') }}">
        </div>
        <div class="form-group">
            <label for="report_month">Report Month</label>
            <input type="number" name="report_month" id="report_month" class="form-control" value="{{ old('report_month') }}">
        </div>
        <div class="form-group">
            <label for="report_year">Report Year</label>
            <input type="number" name="report_year" id="report_year" class="form-control" value="{{ old('report_year') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Metric Project</button>
    </form>
</div>
@endsection
