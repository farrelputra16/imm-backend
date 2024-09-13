<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Company;
use App\Models\Tag;
use App\Models\Sdg;
use App\Models\Indicator;
use App\Models\Metric;
use App\Models\TargetPelanggan;
use App\Models\Dana;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tags', 'sdgs', 'indicators', 'metrics', 'targetPelanggan', 'dana')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $companies = Company::all();
        $tags = Tag::all();
        $sdgs = Sdg::all();
        $indicators = Indicator::all();
        $metrics = Metric::all();
        $targetPelanggan = TargetPelanggan::all();
        $dana = Dana::all();

        return view('projects.create', compact('companies', 'tags', 'sdgs', 'indicators', 'metrics', 'targetPelanggan', 'dana'));
    }

    public function filterMetrics(Request $request)
    {
        $tagIds = $request->input('tag_ids', []);
        $indicatorIds = $request->input('indicator_ids', []);
        
        $metrics = Metric::orWhereHas('tags', function($query) use ($tagIds) {
            $query->whereIn('tags.id', $tagIds);
        })->orWhereHas('indicators', function($query) use ($indicatorIds) {
            $query->whereIn('indicators.id', $indicatorIds);
        })->with('relatedMetrics')->get();
        
        return response()->json($metrics);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',   
            'tujuan' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'gmaps' => 'required|string',
            'jumlah_pendanaan' => 'required|numeric',
            'dana' => 'required|array',
            'dana.*.jenis_dana' => 'required|string',
            'dana.*.nominal' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'tag_ids' => 'array',
            'tag_ids.*' => 'exists:tags,id',
            'sdg_ids' => 'array',
            'sdg_ids.*' => 'exists:sdgs,id',
            'indicator_ids' => 'array',
            'indicator_ids.*' => 'exists:indicators,id',
            'metric_ids' => 'array',
            'metric_ids.*' => 'exists:metrics,id',
            'target_pelanggans' => 'array',
            'target_pelanggans.*.status' => 'nullable|string',
            'target_pelanggans.*.rentang_usia' => 'nullable|string',
            'target_pelanggans.*.deskripsi_pelanggan' => 'nullable|string',
        ]);
        //tambahin ini di FE aja
        $validatedData['status'] = 'Belum selesai';

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $validatedData['img'] = $imageName;
        }
        
        $project = Project::create($validatedData);
        
        $project->tags()->attach($request->input('tag_ids'));
        $project->sdgs()->attach($request->input('sdg_ids'));
        $project->indicators()->attach($request->input('indicator_ids'));
        $project->metrics()->attach($request->input('metric_ids'));

        if ($request->has('dana')) {
            foreach ($request->dana as $dana) {
                $project->dana()->create([
                    'jenis_dana' => $dana['jenis_dana'],
                    'nominal' => $dana['nominal'],
                ]);
            }
        }

        if ($request->has('target_pelanggans')) {
            foreach ($request->target_pelanggans as $target) {
                $project->targetPelanggan()->create([
                    'status' => $target['status'],
                    'rentang_usia' => $target['rentang_usia'],
                    'deskripsi_pelanggan' => $target['deskripsi_pelanggan'],
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function edit($id)
    {
        $project = Project::with(['tags', 'sdgs', 'metrics', 'targetPelanggan', 'dana'])->findOrFail($id);
        $companies = Company::all();
        $tags = Tag::all();
        $sdgs = Sdg::with('indicators')->get();
        $indicators = Indicator::all();
        $metrics = Metric::all();
        $targetPelanggan = TargetPelanggan::all();

        return view('projects.edit', compact('project', 'companies', 'tags', 'sdgs', 'indicators', 'metrics', 'targetPelanggan'));
    }

    public function view($id)
    {
        $project = Project::with('tags', 'indicators')->findOrFail($id);
        return view('projects.view', compact('project'));
    }
     
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validatedData = $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',   
            'tujuan' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'gmaps' => 'required|string',
            'jumlah_pendanaan' => 'required|numeric',
            'dana' => 'required|array',
            'dana.*.jenis_dana' => 'required|string',
            'dana.*.nominal' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'tag_ids' => 'array',
            'tag_ids.*' => 'exists:tags,id',
            'sdg_ids' => 'array',
            'sdg_ids.*' => 'exists:sdgs,id',
            'indicator_ids' => 'array',
            'indicator_ids.*' => 'exists:indicators,id',
            'metric_ids' => 'array',
            'metric_ids.*' => 'exists:metrics,id',
            'target_pelanggans' => 'array',
            'target_pelanggans.*.status' => 'nullable|string',
            'target_pelanggans.*.rentang_usia' => 'nullable|string',
            'target_pelanggans.*.deskripsi_pelanggan' => 'nullable|string',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $validatedData['img'] = $imageName;
        }
        $project->update($validatedData);

        $project->tags()->sync($request->input('tag_ids', []));
        $project->sdgs()->sync($request->input('sdg_ids', []));
        $project->indicators()->sync($request->input('indicator_ids', []));
        $project->metrics()->sync($request->input('metric_ids', []));

        if ($request->has('dana')) {
            $project->dana()->delete();
            foreach ($request->dana as $dana) {
                $project->dana()->create([
                    'jenis_dana' => $dana['jenis_dana'],
                    'nominal' => $dana['nominal'],
                ]);
            }
        }

        if ($request->has('target_pelanggans')) {
            $project->targetPelanggan()->delete();
            foreach ($request->target_pelanggans as $target) {
                $project->targetPelanggan()->create([
                    'status' => $target['status'],
                    'rentang_usia' => $target['rentang_usia'],
                    'deskripsi_pelanggan' => $target['deskripsi_pelanggan'],
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
