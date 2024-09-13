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
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" value="{{ $event->topic }}">
            </div>
            <div class="form-group">
                <label for="cover_img">Cover Image:</label>
                <input type="file" class="form-control-file" name="cover_img">
            </div>
            <div class="form-group">
                <label for="hero_img">Hero Image:</label>
                <input type="file" class="form-control-file" name="hero_img"
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}"
                    required>
            </div>
            <div class="form-group">
                <label for="start">Start</label>
                <input type="datetime-local" name="start" id="start" class="form-control"
                    value="{{ \Illuminate\Support\Carbon::parse($event->start)->format('Y-m-d H:i:s') }}" required>
            </div>
            <div class="form-group">
                <label for="end">End</label>
                <input type="datetime-local" name="end" id="end" class="form-control"
                    value="{{ \Illuminate\Support\Carbon::parse($event->end)->format('Y-m-d H:i:s') }}" required>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" id="deadline" class="form-control"
                    value="{{ \Illuminate\Support\Carbon::parse($event->deadline)->format('Y-m-d H:i:s') }}" required>
            </div>
            <div class="form-group">
                <label for="users">Participant</label>
                @foreach ($users as $user)
                    <div class="form-check">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input"
                            id="user-{{ $user->id }}" {{ in_array($user->id, $eventUsers) ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="user-{{ $user->id }}">{{ $user->getFullNameAttribute() }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
