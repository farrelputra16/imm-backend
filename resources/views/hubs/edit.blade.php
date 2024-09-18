@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Hub</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('hubs.update', $hub->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Hub Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $hub->name }}" required>

                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $hub->location }}" required>

                    <label for="number_of_organizations">Number of Organizations:</label>
                    <input type="number" class="form-control" id="number_of_organizations" name="number_of_organizations" value="{{ $hub->number_of_organizations }}" required>

                    <label for="number_of_people">Number of People:</label>
                    <input type="number" class="form-control" id="number_of_people" name="number_of_people" value="{{ $hub->number_of_people }}" required>

                    <label for="number_of_events">Number of Events:</label>
                    <input type="number" class="form-control" id="number_of_events" name="number_of_events" value="{{ $hub->number_of_events }}" required>

                    <label for="rank">Rank:</label>
                    <input type="number" class="form-control" id="rank" name="rank" value="{{ $hub->rank }}" required>

                    <label for="top_investor_types">Top Investor Types:</label>
                    <input type="text" class="form-control" id="top_investor_types" name="top_investor_types" value="{{ $hub->top_investor_types }}">

                    <label for="top_funding_types">Top Funding Types:</label>
                    <input type="text" class="form-control" id="top_funding_types" name="top_funding_types" value="{{ $hub->top_funding_types }}">

                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $hub->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Hub</button>
            </form>
        </div>
    </div>
</div>
@endsection
