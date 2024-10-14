@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>View Event</h1>
        <form>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" readonly>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" readonly>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" value="{{ $event->topic }}" readonly>
            </div>
            <div class="form-group">
                <label for="allowed_participants">Allowed Participants</label>
                <input type="text" name="allowed_participants" id="allowed_participants" class="form-control" value="{{ $event->allowed_participants }}" readonly>
            </div>
            <div class="form-group">
                <label for="expected_participants">Expected Participants</label>
                <input type="number" name="expected_participants" id="expected_participants" class="form-control" value="{{ $event->expected_participants }}" readonly>
            </div>
            <div class="form-group">
                <label for="fee_type">Fee Type</label>
                <input type="text" name="fee_type" id="fee_type" class="form-control" value="{{ $event->fee_type }}" readonly>
            </div>
            <div class="form-group">
                <label for="organizer_name">Organizer Name</label>
                <input type="text" name="organizer_name" id="organizer_name" class="form-control" value="{{ $event->organizer_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $event->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="nomor_tlpn">Phone Number</label>
                <input type="text" name="nomor_tlpn" id="nomor_tlpn" class="form-control" value="{{ $event->nomor_tlpn }}" readonly>
            </div>
            <div class="form-group">
                <label for="cover_img">Cover Image:</label>
                <div id="cover_img">
                    @if ($event->cover_img)
                        <img src="{{ $event->cover_img }}" height="50" width="50" alt="Event Cover Image">
                        <p>{{ basename($event->cover_img) }}</p>
                    @else
                        <p>No cover image</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="hero_img">Hero Image:</label>
                <div id="hero_img">
                    @if ($event->hero_img)
                        <img src="{{ $event->hero_img }}" height="50" width="50" alt="Event Hero Image">
                        <p>{{ basename($event->hero_img) }}</p>
                    @else
                        <p>No hero image</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" readonly>
            </div>
            <div class="form-group">
                <label for="start">Start</label>
                <input type="datetime-local" name="start" id="start" class="form-control" value="{{ \Illuminate\Support\Carbon::parse($event->start)->format('Y-m-d\TH:i') }}" readonly>
            </div>
            <div class="form-group">
                <label for="event_duration">Event Duration</label>
                <input type="text" name="event_duration" id="event_duration" class="form-control" value="{{ $event->event_duration }}" readonly>
            </div>
            <div class="form-group">
                <label for="users">Participant</label>
                @foreach ($users as $user)
                    <div class="form-check">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input" id="user-{{ $user->id }}" {{ in_array($user->id, $eventUsers) ? 'checked' : '' }} disabled readonly>
                        <label class="form-check-label" for="user-{{ $user->id }}">{{ $user->getFullNameAttribute() }}</label>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
@endsection
