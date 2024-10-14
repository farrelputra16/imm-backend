@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
                @error('title')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
                @error('description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" value="{{ $event->topic }}">
                @error('topic')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="allowed_participants">Allowed Participants</label>
                <input type="text" name="allowed_participants" id="allowed_participants" class="form-control" value="{{ $event->allowed_participants }}">
                @error('allowed_participants')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="expected_participants">Expected Participants</label>
                <input type="number" name="expected_participants" id="expected_participants" class="form-control" value="{{ $event->expected_participants }}">
                @error('expected_participants')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="fee_type">Fee Type</label>
                <select name="fee_type" id="fee_type" class="form-control" required>
                    <option value="Free" {{ $event->fee_type == 'Free' ? 'selected' : '' }}>Free</option>
                    <option value="Paid" {{ $event->fee_type == 'Paid' ? 'selected' : '' }}>Paid</option>
                </select>
                @error('fee_type')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="organizer_name">Organizer Name</label>
                <input type="text" name="organizer_name" id="organizer_name" class="form-control" value="{{ $event->organizer_name }}" required>
                @error('organizer_name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $event->email }}" required>
                @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="nomor_tlpn">Phone Number</label>
                <input type="text" name="nomor_tlpn" id="nomor_tlpn" class="form-control" value="{{ $event->nomor_tlpn }}" required>
                @error('nomor_tlpn')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="cover_img">Cover Image:</label>
                <input type="file" class="form-control-file" name="cover_img">
                @error('cover_img')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="hero_img">Hero Image:</label>
                <input type="file" class="form-control-file" name="hero_img">
                @error('hero_img')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="location"> Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" required>
                @error('location')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="start">Start</label>
                <input type="datetime-local" name="start" id="start" class="form-control" value="{{ \Illuminate\Support\Carbon::parse($event->start)->format('Y-m-d\TH:i') }}" required>
                @error('start')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="event_duration">Event Duration</label>
                <input type="text" name="event_duration" id="event_duration" class="form-control" value="{{ $event->event_duration }}" required placeholder="e.g., 10.00 - 13.00">
                <small class="form-text text-muted">Please enter the duration in the format: Start - End (e.g., 10.00 - 13.00)</small>
                @error('event_duration')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="users">Participant</label>
                @foreach ($users as $user)
                    <div class="form-check">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input" id="user-{{ $user->id }}" {{ in_array($user->id, $eventUsers) ? 'checked' : '' }}>
                        <label class="form-check-label" for="user-{{ $user->id }}">{{ $user->getFullNameAttribute() }}</label>
                    </div>
                @endforeach
                @error('users')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
