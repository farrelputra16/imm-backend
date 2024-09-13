<?php

namespace App\Http\Controllers;

use App\Models\CompanyOutcome;
use App\Models\Company;
use App\Models\Project;
use App\Models\Dana;
use Illuminate\Http\Request;

class CompanyOutcomeController extends Controller
{
    public function selectCompany()
    {
        $companies = Company::all();
        return view('company_outcome.select_company', compact('companies'));
    }

    public function index(Request $request)
    {
        $companyId = $request->get('company_id');
        if (!$companyId) {
            return redirect()->route('company-outcome.select-company')->with('error', 'No company selected.');
        }

        $projects = Project::where('company_id', $companyId)
            ->whereHas('dana', function ($query) {
                $query->where('jenis_dana', 'Hibah');
            })
            ->with(['dana' => function ($query) {
                $query->where('jenis_dana', 'Hibah');
            }])
            ->get();


        $outcomes = collect();
        foreach ($projects as $project) {
            $outcome = new CompanyOutcome();
            $outcome->project_id = $project->id;
            $outcomes->push($outcome);
        }

        $outcomes->each(function ($outcome) {
            $outcome->dana_hibah = $outcome->project->dana->first();
        });

        return view('company_outcome.index', compact('outcomes'));
    }

    public function detailOutcome($project_id)
    {
        $outcomes = CompanyOutcome::where('project_id', $project_id)->get();
        
        if ($outcomes->isEmpty()) {
            return view('company_outcome.detail_outcome', ['project_id' => $project_id]);
        }
    
        return view('company_outcome.detail_outcome', compact('outcomes', 'project_id'));
    }
    

        public function create($project_id)
        {
            $project = Project::findOrFail($project_id);
            return view('company_outcome.create', compact('project'));
        }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'jumlah_biaya' => 'required|numeric',
            'category' => 'required|string|max:50',
            'keterangan' => 'required|string|max:1000',
            'bukti' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:5000', // Adjust max file size as needed
            'project_id' => 'required|exists:projects,id',
        ]);
    
        $buktiFile = time() . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('images'), $buktiFile);
    
        CompanyOutcome::create([
            'date' => $validatedData['date'],
            'jumlah_biaya' => $validatedData['jumlah_biaya'],
            'category' => $validatedData['category'],
            'keterangan' => $validatedData['keterangan'],
            'bukti' => $buktiFile,
            'project_id' => $validatedData['project_id'],
        ]);
    
        return redirect()->route('company-outcome.detail-outcome', ['project_id' => $validatedData['project_id']])
                        ->with('success', 'Company outcome created successfully.');
    }
    

    

    public function show(CompanyOutcome $companyOutcome)
    {
        return view('company_outcome.view', compact('companyOutcome'));
    }
    

    public function edit(CompanyOutcome $companyOutcome)
    {
        $projects = Project::all();
        return view('company_outcome.edit', compact('companyOutcome', 'projects'));
    }

    public function update(Request $request, CompanyOutcome $companyOutcome)
{
    $validatedData = $request->validate([
        'date' => 'required|date',
        'jumlah_biaya' => 'required|numeric',
        'category' => 'required|string|max:50',
        'keterangan' => 'required|string|max:1000',
        'bukti' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:5000', // Adjust max file size as needed
        'project_id' => 'required|exists:projects,id',
    ]);

    // Handle file upload if a new file is provided
    if ($request->hasFile('bukti')) {
        // Delete the old file if it exists
        if ($companyOutcome->bukti) {
            $oldFilePath = public_path('images') . '/' . $companyOutcome->bukti;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Upload the new file
        $buktiFile = time() . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('images'), $buktiFile);

        // Update the 'bukti' field in the validated data
        $validatedData['bukti'] = $buktiFile;
    }

    $companyOutcome->update($validatedData);

    return redirect()->route('company-outcome.detail-outcome', ['project_id' => $companyOutcome->project_id])
                     ->with('success', 'Company outcome updated successfully.');
}


    public function destroy(CompanyOutcome $companyOutcome)
    {
        $projectId = $companyOutcome->project_id; // Mendapatkan project_id sebelum menghapus
        $companyOutcome->delete();
    
        return redirect()->route('company-outcome.detail-outcome', ['project_id' => $projectId])
                         ->with('success', 'Company outcome deleted successfully.');
    }
    
}
