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
                <input type="text" name="topic" id="topic" class="form-control" value="{{ $event->topic }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="cover_img">Cover Image:</label>
                <div id="cover_img">
                    @if ($event->cover_img)
                        <img src="{{ asset('images/' . $event->cover_img) }}" height="50" width="50" alt="Event Cover Image">
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
                        <img src="{{ asset('images/' . $event->hero_img) }}" height="50" width="50" alt="Event Cover Image">
                        <p>{{ basename($event->hero_img) }}</p>
                    @else
                        <p>No hero image</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="start">Start</label>
                <input type="datetime-local" name="start" id="start" class="form-control"
                    value="{{ \Illuminate\Support\Carbon::parse($event->start)->format('Y-m-d\TH:i') }}" readonly>
            </div>
            <div class="form-group">
                <label for="end">End</label>
                <input type="datetime-local" name="end" id="end" class="form-control"
                    value="{{ \Illuminate\Support\Carbon::parse($event->end)->format('Y-m-d\TH:i') }}" readonly>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" id="deadline" class="form-control"
                    value="{{ \Illuminate\Support\Carbon::parse($event->deadline)->format('Y-m-d\TH:i') }}" readonly>
            </div>
            <div class="form-group">
                <label for="users">Participant</label>
                @foreach ($users as $user)
                    <div class="form-check">
                        <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input"
                            id="user-{{ $user->id }}" {{ in_array($user->id, $eventUsers) ? 'checked' : '' }} disabled
                            readonly>
                        <label class="form-check-label"
                            for="user-{{ $user->id }}">{{ $user->getFullNameAttribute() }}</label>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
@endsection
