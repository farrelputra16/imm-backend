@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $hub->name }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <p><strong>Location:</strong> {{ $hub->location }}</p>
            <p><strong>Number of Organizations:</strong> {{ $hub->number_of_organizations }}</p>
            <p><strong>Number of People:</strong> {{ $hub->number_of_people }}</p>
            <p><strong>Number of Events:</strong> {{ $hub->number_of_events }}</p>
            <p><strong>Rank:</strong> {{ $hub->rank }}</p>
            <p><strong>Top Investor Types:</strong> {{ $hub->top_investor_types }}</p>
            <p><strong>Top Funding Types:</strong> {{ $hub->top_funding_types }}</p>
            <p><strong>Description:</strong> {{ $hub->description }}</p>
            <a href="{{ route('hubs.index') }}" class="btn btn-secondary">Back to Hubs</a>
        </div>
    </div>
</div>
@endsection
