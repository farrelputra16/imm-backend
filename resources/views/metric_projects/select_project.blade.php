@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h1>Select a Project</h1>
    @if ($projects->isEmpty())
        <p>No projects found.</p>
    @else
        <div class="list-group">
            @foreach ($projects as $project)
                <a href="{{ route('metric-projects.index', $project->id) }}" class="list-group-item list-group-item-action">
                    {{ $project->nama }}
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
