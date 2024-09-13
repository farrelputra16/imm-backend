@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">Create New Metric</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('metrics.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="definition">Definition:</label>
                    <textarea class="form-control" id="definition" name="definition"></textarea>
                </div>

                <div class="form-group">
                    <label for="calculation">Calculation (Optional):</label>
                    <textarea class="form-control" id="calculation" name="calculation"></textarea>
                </div>
                <div class="form-group">
                    <label for="usage_guidance">Usage Guidance:</label>
                    <textarea class="form-control" id="usage_guidance" name="usage_guidance" required></textarea>
                </div>

                <div class="form-group">
                    <label for="social">Social:</label>
                    <select class="form-control" id="social" name="social" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="environmental">Environmental:</label>
                    <select class="form-control" id="environmental" name="environmental" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="section">Section:</label>
                    <input type="text" class="form-control" id="section" name="section" required>
                </div>
                <div class="form-group">
                    <label for="subsection">Subsection (Optional):</label>
                    <input type="text" class="form-control" id="subsection" name="subsection">
                </div>

                <div class="form-group">
                    <label for="level_type">Level Type:</label>
                    <input type="number" class="form-control" id="level_type" name="level_type" value="1">
                </div>

                <div class="form-group">
                    <label for="related_metrics_code">Related Metrics Code (Optional):</label>
                    <input type="text" class="form-control" id="related_metrics_code" name="related_metrics_code">
                </div>

                <div class="form-group">
                    <label for="metric_level">Metric Level:</label>
                    <input type="text" class="form-control" id="metric_level" name="metric_level" required>
                </div>

                <div class="form-group">
                    <label for="quantity_type">Quantity Type:</label>
                    <input type="text" class="form-control" id="quantity_type" name="quantity_type" required>
                </div>

                <div class="form-group">
                    <label for="reporting_format">Reporting Format:</label>
                    <input type="text" class="form-control" id="reporting_format" name="reporting_format" required>
                </div>

                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <select multiple class="form-control" id="tags" name="tag_ids[]">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="indicators">Indicators:</label>
                    <select multiple class="form-control" id="indicators" name="indicator_ids[]">
                        @foreach ($indicators as $indicator)
                            <option value="{{ $indicator->id }}">{{ $indicator->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Metric</button>
            </form>
        </div>
    </div>
</div>
@endsection
