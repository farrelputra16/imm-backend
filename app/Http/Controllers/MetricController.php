<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use App\Models\Tag;
use App\Models\Indicator;
use Illuminate\Http\Request;

class MetricController extends Controller
{
    public function index()
    {
        $metrics = Metric::with('tags', 'indicators')->get();
        return view('metrics.index', compact('metrics'));
    }
    
    public function create()
    {
        $tags = Tag::all();
        $indicators = Indicator::all();

        return view('metrics.create', compact('tags', 'indicators'));
    }


    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'definition' => 'nullable|string',
            'calculation' => 'nullable|string',
            'usage_guidance' => 'nullable|string',
            'social' => 'nullable|boolean',
            'environmental' => 'nullable|boolean',
            'section' => 'nullable|string|max:255',
            'subsection' => 'nullable|string|max:255',
            'level_type' => 'nullable|string|max:255',
            'related_metrics_code' => 'nullable|string|max:255',
            'metric_level' => 'nullable|string|max:255',
            'quantity_type' => 'nullable|string|max:255',
            'reporting_format' => 'nullable|string|max:255',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
            'indicator_ids' => 'nullable|array',
            'indicator_ids.*' => 'exists:indicators,id',
        ]);
    
        // Create a new metric using validated data
        $metric = Metric::create($validatedData);
    
        // Attach tags and indicators if provided
        if ($request->has('tag_ids')) {
            $metric->tags()->attach($request->input('tag_ids'));
        }
    
        if ($request->has('indicator_ids')) {
            $metric->indicators()->attach($request->input('indicator_ids'));
        }
    
        // Redirect back with success message
        return redirect()->route('metrics.index')->with('success', 'Metric created successfully');
    }

    public function view($id)
{
    $metric = Metric::with('tags', 'indicators')->findOrFail($id);
    return view('metrics.view', compact('metric'));
}


    public function edit($id)
{
    $metric = Metric::with('tags', 'indicators')->findOrFail($id);
    $tags = Tag::all();
    $indicators = Indicator::all();

    return view('metrics.edit', compact('metric', 'tags', 'indicators'));
}


public function update(Request $request, $id)
{
    // Validate incoming data
    $validatedData = $request->validate([
        'code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'definition' => 'nullable|string',
        'calculation' => 'nullable|string',
        'usage_guidance' => 'nullable|string',
        'social' => 'nullable|boolean',
        'environmental' => 'nullable|boolean',
        'section' => 'nullable|string|max:255',
        'subsection' => 'nullable|string|max:255',
        'level_type' => 'nullable|string|max:255',
        'related_metrics_code' => 'nullable|string|max:255',
        'metric_level' => 'nullable|string|max:255',
        'quantity_type' => 'nullable|string|max:255',
        'reporting_format' => 'nullable|string|max:255',
        'tag_ids' => 'nullable|array',
        'tag_ids.*' => 'exists:tags,id',
        'indicator_ids' => 'nullable|array',
        'indicator_ids.*' => 'exists:indicators,id',
    ]);

    // Find the Metric by ID
    $metric = Metric::findOrFail($id);

    // Update the metric with validated data
    $metric->update($validatedData);

    // Sync tags and indicators
    $metric->tags()->sync($request->input('tag_ids', []));
    $metric->indicators()->sync($request->input('indicator_ids', []));

    // Redirect back with success message
    return redirect()->route('metrics.index')->with('success', 'Metric updated successfully');
}

    public function destroy($id)
    {
        Metric::destroy($id);
        return redirect()->route('metrics.index')->with('success', 'Metric deleted successfully');
    }
}
