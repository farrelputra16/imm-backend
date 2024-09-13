@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Surveys</h1>
        <a href="{{ route('surveys.create') }}" class="btn btn-primary">Create New Survey</a>
        <table id="surveys-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Project Name</th>
                    <th>Questions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surveys as $item)
                    <tr>
                        <td>{{ $item['survey']->name }}</td>
                        <td>{{ $item['project_name'] }}</td>
                        <td>
                            <ul>
                                @foreach ($item['survey']->questions as $question)
                                    <li>
                                        <strong>{{ $question->content }}</strong> ({{ $question->type }})
                                        @if ($question->rules)
                                            <br>Rules: {{ implode(', ', $question->rules) }}
                                        @endif
                                        @if ($question->options)
                                            <br>Options: {{ implode(', ', $question->options) }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('surveys.view', $item['survey']->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('surveys.entry', $item['survey']->id) }}" class="btn btn-info">Fill</a>
                            <a href="{{ route('surveys.results', $item['survey']->id) }}" class="btn btn-info">Result</a>
                            <a href="{{ route('surveys.edit', $item['survey']->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('surveys.destroy', $item['survey']->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#surveys-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
