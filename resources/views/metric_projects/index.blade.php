@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Metric Projects for Project: {{ $project->nama }}</h1>

        <h2>Initial Metrics</h2>
        @if ($initialMetricProjects->count())
            <table id="initial-metrics-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($initialMetricProjects as $metricProject)
                        <tr>
                            <td>{{ $metricProject->metric->name }}</td>
                            <td>{{ $metricProject->value }}</td>
                            <td>
                                <a href="{{ route('metric-projects.edit', [$project->id, $metricProject->id]) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('metric-projects.addReport', [$project->id, $metricProject->id]) }}"
                                    class="btn btn-primary btn-sm">Add Report</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No initial metrics available.</p>
        @endif

        <h2>Reports</h2>
        @if ($reportMetricProjects->count())
            <table id="reports-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Value</th>
                        <th>Report Month</th>
                        <th>Report Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportMetricProjects as $report)
                        <tr>
                            <td>{{ $report->metric->name }}</td>
                            <td>{{ $report->value }}</td>
                            <td>{{ $report->report_month }}</td>
                            <td>{{ $report->report_year }}</td>
                            <td>
                                <a href="{{ route('metric-projects.edit', [$project->id, $report->id]) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('metric-projects.destroy', [$project->id, $report->id]) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this metric project?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No reports available.</p>
        @endif

        <h2>Monthly Report Chart</h2>
        <div style="width: 100%; max-width: 800px; margin: auto;">
            {!! $chart->container() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {!! $chart->script() !!}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chart = {!! $chart->container() !!};

            chart.options = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Month/Year'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Total Value'
                        }
                    }
                }
            };

            chart.update();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#initial-metrics-table').DataTable({
                responsive: true
            });
            $('#reports-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection

