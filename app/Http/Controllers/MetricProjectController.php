<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Metric;
use App\Models\MetricProject;
use App\Charts\MonthlyReportChart;
use App\Models\MatrixReport;



class MetricProjectController extends Controller
{
    public function selectProject()
    {
        $projects = Project::all();
        return view('metric_projects.select_project', compact('projects'));
    }

    public function index($id)
    {
        $project = Project::findOrFail($id);

        // Fetch initial metrics (where report_month and report_year are null)
        $initialMetricProjects = $project->metricProjects()->whereNull('report_month')->whereNull('report_year')->get();

        // Fetch report metrics (where report_month and report_year are not null)
        $reportMetricProjects = $project->metricProjects()->whereNotNull('report_month')->whereNotNull('report_year')->get();

        // Fetch monthly report data
        $monthlyReports = MetricProject::selectRaw('report_month, report_year, SUM(value) as total_value')
            ->where('project_id', $id)
            ->whereNotNull('report_month')
            ->whereNotNull('report_year')
            ->groupBy('report_year', 'report_month')
            ->orderBy('report_year')
            ->orderBy('report_month')
            ->get();

        // Transform the data for the chart
        $labels = $monthlyReports->map(function($report) {
            return $report->report_month . '/' . $report->report_year;
        });

        $values = $monthlyReports->pluck('total_value');

        // Create chart
        $chart = new MonthlyReportChart;
        $chart->labels($labels);
        $chart->dataset('Total Values', 'line', $values)
              ->color('rgba(75, 192, 192, 1)')
              ->backgroundcolor('rgba(75, 192, 192, 0.2)');

        return view('metric_projects.index', compact('project', 'initialMetricProjects', 'reportMetricProjects', 'chart'));
    }

    

    public function create($id)
    {
        $project = Project::findOrFail($id);
        $metrics = $project->metrics;
        return view('metric_projects.create', compact('project', 'metrics'));
    }

    public function store(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $request->validate([
            'metric_id' => 'required|exists:metrics,id',
            'value' => 'nullable|string',
            'report_month' => 'nullable|integer|min:1|max:12',
            'report_year' => 'nullable|integer',
        ]);

        $metricProject = MetricProject::create([
            'project_id' => $project->id,
            'metric_id' => $request->metric_id,
            'value' => $request->value,
            'report_month' => $request->report_month,
            'report_year' => $request->report_year,
            'metric_project_id' => null,
        ]);

        return redirect()->route('metric-projects.index', $project->id)->with('success', 'Metric project created successfully.');
    }

    public function addReport($projectId, $metricProjectId)
    {
        $project = Project::findOrFail($projectId);
        $metricProject = MetricProject::findOrFail($metricProjectId);
        return view('metric_projects.add_report', compact('project', 'metricProject'));
    }

    public function storeReport(Request $request, $projectId, $metricProjectId)
    {
        $project = Project::findOrFail($projectId);
        $metricProject = MetricProject::findOrFail($metricProjectId);

        $request->validate([
            'value' => 'required|string',
            'report_month' => 'required|integer|min:1|max:12',
            'report_year' => 'required|integer',
        ]);

        MetricProject::create([
            'project_id' => $project->id,
            'metric_id' => $metricProject->metric_id,
            'value' => $request->value,
            'report_month' => $request->report_month,
            'report_year' => $request->report_year,
            'metric_project_id' => $metricProject->id,
        ]);

        return redirect()->route('metric-projects.index', $project->id)->with('success', 'Metric report added successfully.');
    }

    public function edit($projectId, $metricProjectId)
    {
        $project = Project::findOrFail($projectId);
        $metricProject = MetricProject::findOrFail($metricProjectId);
        $metrics = $project->metrics;
        return view('metric_projects.edit', compact('project', 'metricProject', 'metrics'));
    }

    public function update(Request $request, $projectId, $metricProjectId)
    {
        $project = Project::findOrFail($projectId);
        $metricProject = MetricProject::findOrFail($metricProjectId);

        $request->validate([
            'metric_id' => 'required|exists:metrics,id',
            'value' => 'nullable|string',
            'report_month' => 'nullable|integer|min:1|max:12',
            'report_year' => 'nullable|integer',
        ]);

        $metricProject->update($request->all());

        return redirect()->route('metric-projects.index', $project->id)->with('success', 'Metric project updated successfully.');
    }

    public function destroy($projectId, $metricProjectId)
    {
        // Find the report metric project
        $project = Project::findOrFail($projectId);
        $metricProject = MetricProject::findOrFail($metricProjectId);

        // Delete the report metric project
        $metricProject->delete();

        // Redirect back with success message
        return redirect()->route('metric-projects.index', $project->id)->with('success', 'Metric project deleted successfully.');
    }
}
