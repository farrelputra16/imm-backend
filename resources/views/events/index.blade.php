@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Create Event</a>
        @if ($events->isEmpty())
            <p>No event found.</p>
        @else
            <table id="events-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Topic</th>
                        <th>Allowed Participants</th>
                        <th>Expected Participants</th>
                        <th>Fee Type</th>
                        <th>Organizer Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Cover Image</th>
                        <th>Hero Image</th>
                        <th>Location</th>
                        <th>Start</th>
                        <th>Event Duration</th>
                        <th>Registered Users</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->topic }}</td>
                            <td>{{ $event->allowed_participants }}</td>
                            <td>{{ $event->expected_participants }}</td>
                            <td>{{ $event->fee_type }}</td>
                            <td>{{ $event->organizer_name }}</td>
                            <td>{{ $event->email }}</td>
                            <td>{{ $event->nomor_tlpn }}</td>
                            <td>
                                @if ($event->cover_img)
                                    <img src="{{ $event->cover_img }}" height="50" width="50" alt="Event Cover Image">
                                @else
                                    <p>No cover image</p>
                                @endif
                            </td>
                            <td>
                                @if ($event->hero_img)
                                    <img src="{{ $event->hero_img }}" height="50" width="50" alt="Event Hero Image">
                                @else
                                    <p>No hero image</p>
                                @endif
                            </td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->start }}</td>
                            <td>{{ $event->event_duration }}</td>
                            <td>{{ $event->users_count }}</td>
                            <td>
                                <a href="{{ route('events.view', $event->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            $('#events-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
