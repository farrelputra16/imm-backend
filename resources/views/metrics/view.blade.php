@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">View Metric</h1>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $metric->code }}" disabled>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $metric->name }}" disabled>
                </div>

                <div class="form-group">
                    <label for="definition">Definition:</label>
                    <textarea class="form-control" id="definition" name="definition" disabled>{{ $metric->definition }}</textarea>
                </div>

                <div class="form-group">
                    <label for="calculation">Calculation:</label>
                    <textarea class="form-control" id="calculation" name="calculation" disabled>{{ $metric->calculation }}</textarea>
                </div>

                <div class="form-group">
                    <label for="usage_guidance">Usage Guidance:</label>
                    <textarea class="form-control" id="usage_guidance" name="usage_guidance" disabled>{{ $metric->usage_guidance }}</textarea>
                </div>

                <div class="form-group">
                    <label for="social">Social:</label>
                    <input type="text" class="form-control" id="social" name="social" value="{{ $metric->social ? 'Yes' : 'No' }}" disabled>
                </div>

                <div class="form-group">
                    <label for="environmental">Environmental:</label>
                    <input type="text" class="form-control" id="environmental" name="environmental" value="{{ $metric->environmental ? 'Yes' : 'No' }}" disabled>
                </div>

                <div class="form-group">
                    <label for="section">Section:</label>
                    <input type="text" class="form-control" id="section" name="section" value="{{ $metric->section }}" disabled>
                </div>

                <div class="form-group">
                    <label for="subsection">Subsection:</label>
                    <input type="text" class="form-control" id="subsection" name="subsection" value="{{ $metric->subsection }}" disabled>
                </div>

                <div class="form-group">
                    <label for="level_type">Level Type:</label>
                    <input type="number" class="form-control" id="level_type" name="level_type" value="{{ $metric->level_type }}" disabled>
                </div>

                <div class="form-group">
                    <label for="related_metrics_code">Related Metrics Code:</label>
                    <input type="text" class="form-control" id="related_metrics_code" name="related_metrics_code" value="{{ $metric->related_metrics_code }}" disabled>
                </div>

                <div class="form-group">
                    <label for="metric_level">Metric Level:</label>
                    <input type="text" class="form-control" id="metric_level" name="metric_level" value="{{ $metric->metric_level }}" disabled>
                </div>
                 <div class="form-group">
                    <label for="quantity_type">Quantity Type:</label>
                    <input type="text" class="form-control" id="quantity_type" name="quantity_type" value="{{ $metric->quantity_type }}" disabled>
                </div>
                 <div class="form-group">
                    <label for="reporting_format">Reporting Format:</label>
                    <input type="text" class="form-control" id="reporting_format" name="reporting_format" value="{{ $metric->reporting_format }}" disabled>
                </div>


                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <div class="form-control" style="height: auto;">
                        @foreach ($metric->tags as $tag)
                            {{ $tag->nama }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="indicators">Indicators:</label>
                    <div class="form-control" style="height: auto;">
                        @foreach ($metric->indicators as $indicator)
                            {{ $indicator->name }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
