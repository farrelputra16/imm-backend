<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
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
        return view('companies.index', compact('companies'));
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
            'tipe' => 'required',
            'nama_pic' => 'required',
            'posisi_pic' => 'required',
            'telepon' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'jumlah_karyawan' => 'required',
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
            'tipe' => 'required',
            'nama_pic' => 'required',
            'posisi_pic' => 'required',
            'telepon' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'jumlah_karyawan' => 'required',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function view($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.view', compact('company'));
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
}
