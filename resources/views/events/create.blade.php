@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Event</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control">
            </div>
            <div class="form-group">
                <label for="allowed_participants">Allowed Participants</label>
                <input type="text" name="allowed_participants" id="allowed_participants" class="form-control">
            </div>
            <div class="form-group">
                <label for="expected_participants">Expected Participants</label>
                <input type="number" name="expected_participants" id="expected_participants" class="form-control">
            </div>
            <div class="form-group">
                <label for="fee_type">Fee Type</label>
                <select name="fee_type" id="fee_type" class="form-control" required>
                    <option value="Free">Free</option>
                    <option value="Paid">Paid</option>
                </select>
            </div>
            <div class="form-group">
                <label for="organizer_name">Organizer Name</label>
                <input type="text" name="organizer_name" id="organizer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nomor_tlpn">Phone Number</label>
                <input type="text" name="nomor_tlpn" id="nomor_tlpn" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cover_img">Cover Image:</label>
                <input type="file" name="cover_img" class="form-control" accept=".jpg,.jpeg,.png,.gif,.bmp,.webp">
            </div>
            <div class="form-group">
                <label for="hero_img">Hero Image:</label>
                <input type="file" name="hero_img" class="form-control" accept=".jpg,.jpeg,.png,.gif,.bmp,.webp">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start">Start</label>
                <input type="datetime-local" name="start" id="start" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="event_duration">Event Duration</label>
                <input type="text" name="event_duration" id="event_duration" class="form-control" required placeholder="e.g., 10.00 - 13.00">
                <small class="form-text text-muted">Please enter the duration in the format: Start - End (e.g., 10.00 - 13.00)</small>
            </div>
            <div class="form-group">
                <label for="users">Users</label>
                @foreach ($users as $user)
                    <div class="form-check">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input" id="user-{{ $user->id }}">
                        <label class="form-check-label" for="user-{{ $user->id }}">{{ $user->getFullNameAttribute() }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
