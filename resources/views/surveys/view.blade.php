@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>{{ $survey->name }}</h1>

        <div class="form-group">
            <label for="project_id">Selected Project</label>
            <select id="project_id" class="form-control" disabled>
                <option value="">-- Select Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $survey->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->nama }}</option>
                @endforeach
            </select>
        </div>

        @foreach ($survey->sections as $section)
            @include('survey::sections.single', ['section' => $section, 'lastEntry' => $lastEntry])
        @endforeach

        <a href="{{ route('surveys.index') }}" class="btn btn-secondary mt-4">Back to Surveys</a>
    </div>
@endsection
