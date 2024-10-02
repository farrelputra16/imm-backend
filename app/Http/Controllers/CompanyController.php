<?php

namespace App\Http\Controllers;

use App\Models\Sdg;
use App\Models\User;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        $sdg_projects = SDG::whereHas('projects.company', function ($query) {
            $query->select('id'); // Anda bisa menambahkan filter di sini jika diperlukan
        })->distinct()->get();
        return view('companies.index', compact('companies', 'sdg_projects'));
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ambil semua pengguna yang belum memiliki perusahaan
        $users = User::whereDoesntHave('companies')->get();

        return view('companies.create', compact('users'));
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'profile' => 'required',
            'founded_date' => 'required',
            'tipe' => 'required',
            'nama_pic' => 'required',
            'posisi_pic' => 'required',
            'telepon' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'jumlah_karyawan' => 'required',
            'startup_summary' => 'required',
            'user_id' => 'required|exists:users,id|not_in:'.implode(',', Company::pluck('user_id')->toArray()),
        ], [
            'user_id.not_in' => 'The selected user already has a company.'
        ]);

        Company::create($validated);

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified Company.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        
        // Ambil semua pengguna yang belum memiliki perusahaan
        $users = User::all();
    
        return view('companies.edit', compact('company', 'users'));
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'profile' => 'required',
            'founded_date' => 'required',
            'tipe' => 'required',
            'nama_pic' => 'required',
            'posisi_pic' => 'required',
            'telepon' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'jumlah_karyawan' => 'required',
            'startup_summary' => 'required',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function view($id)
    {
        $company = Company::findOrFail($id);
        $company->load('incomes', 'teamMembers', 'projects', 'hubs');
        $company->total_funding = $company->incomes->sum('jumlah');

        $allprojectQuery = Project::with('tags', 'sdgs', 'indicators', 'metrics', 'targetPelanggan', 'dana')
        ->whereHas('company', function ($query) use ($company) {
            $query->where('id', $company->id);
        });

        $allproject = $allprojectQuery->get();
        $ongoingProjects = $allprojectQuery->where('status', 'Belum selesai')->get();
        $completedProjects = $allprojectQuery->where('status', 'Selesai')->get();

        return view('companies.view', compact('company', 'ongoingProjects', 'completedProjects'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }
    /**
     * Menampilkan halaman untuk anggota team company tersebut
     */
    public function showTeam($id)
    {
        $company = Company::findOrFail($id);
        $team = $company->teamMembers;
        return view('companies.team', compact('team', 'company'));
    }
}
