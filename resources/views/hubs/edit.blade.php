@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Hub</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('hubs.update', $hubs->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <!-- Nama Hub -->
                    <label for="name">Hub Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $hubs->name }}" required>

                    <!-- Provinsi -->
                    <label for="provinsi">Provinsi:</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $hubs->provinsi }}" required>

                    <!-- Kota -->
                    <label for="kota">Kota:</label>
                    <input type="text" class="form-control" id="kota" name="kota" value="{{ $hubs->kota }}" required>

                    <!-- Rank -->
                    <label for="rank">Rank:</label>
                    <input type="number" class="form-control" id="rank" name="rank" value="{{ $hubs->rank }}" required>

                    <!-- Top Investor Types -->
                    <label for="top_investor_types">Top Investor Types:</label>
                    <input type="text" class="form-control" id="top_investor_types" name="top_investor_types" value="{{ $hubs->top_investor_types }}">

                    <!-- Top Funding Types -->
                    <label for="top_funding_types">Top Funding Types:</label>
                    <input type="text" class="form-control" id="top_funding_types" name="top_funding_types" value="{{ $hubs->top_funding_types }}">

                    <!-- Description -->
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $hubs->description }}</textarea>

                    <!-- Dropdown untuk Companies -->
                    <label for="company_ids">Companies:</label>
                    <select name="company_ids[]" id="company_ids" class="form-control" multiple>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ $hubs->companies->contains($company->id) ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Dropdown untuk People -->
                    <label for="people_ids">People:</label>
                    <select name="people_ids[]" id="people_ids" class="form-control" multiple>
                        @foreach($people as $person)
                            <option value="{{ $person->id }}" {{ $hubs->people->contains($person->id) ? 'selected' : '' }}>
                                {{ $person->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Dropdown untuk Events -->
                    <label for="event_ids">Events:</label>
                    <select name="event_ids[]" id="event_ids" class="form-control" multiple>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}" {{ $hubs->events->contains($event->id) ? 'selected' : '' }}>
                                {{ $event->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Hub</button>
            </form>
        </div>
    </div>
</div>
@endsection
