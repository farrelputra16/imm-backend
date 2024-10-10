@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ $hubs->name }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <p><strong>Provinsi:</strong> {{ $hubs->provinsi }}</p>
            <p><strong>Kota:</strong> {{ $hubs->kota }}</p>
            <p><strong>Rank:</strong> {{ $hubs->rank }}</p>
            <p><strong>Top Investor Types:</strong> {{ $hubs->top_investor_types }}</p>
            <p><strong>Top Funding Types:</strong> {{ $hubs->top_funding_types }}</p>
            <p><strong>Description:</strong> {{ $hubs->description }}</p>

            <!-- Menampilkan Companies Terkait -->
            <h4>Companies:</h4>
            <ul>
                @forelse($hubs->companies as $company)
                    <li>{{ $company->name }}</li>
                @empty
                    <li>No companies associated with this hub.</li>
                @endforelse
            </ul>

            <!-- Menampilkan People Terkait -->
            <h4>People:</h4>
            <ul>
                @forelse($hubs->people as $person)
                    <li>{{ $person->name }}</li>
                @empty
                    <li>No people associated with this hub.</li>
                @endforelse
            </ul>

            <!-- Menampilkan Events Terkait -->
            <h4>Events:</h4>
            <ul>
                @forelse($hubs->events as $event)
                    <li>{{ $event->name }}</li>
                @empty
                    <li>No events associated with this hub.</li>
                @endforelse
            </ul>

            <a href="{{ route('hubs.index') }}" class="btn btn-secondary">Back to Hubs</a>
        </div>
    </div>
</div>
@endsection
