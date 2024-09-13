@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>{{ $survey->name }}</h1>

        <form action="{{ route('surveys.submit', $survey->id) }}" method="POST">
            @csrf
            @foreach ($survey->sections as $section)
                @include('survey::sections.single', ['section' => $section, 'lastEntry' => $lastEntry])
            @endforeach

            <a href="{{ route('surveys.index') }}" class="btn btn-secondary mt-4">Back to Surveys</a>
            <button type="submit" class="btn btn-primary mt-4">Submit Responses</button>
        </form>
    </div>
@endsection
