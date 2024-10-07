<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::all();
        return view('investors.index', compact('investors'));
    }

    public function create()
{
    $companies = Company::all(); // Ambil semua data perusahaan
    return view('investors.create', compact('companies'));
}

public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'org_name' => 'nullable|exists:companies,id', // Validasi bahwa org_name harus ada di tabel companies
        'number_of_contacts' => 'nullable|integer|min:0',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
        'departments' => 'required|string|max:255',
        'investment_stage' => 'nullable|string|max:255',
        'nama_depan' => 'required|string|max:255',
        'nama_belakang' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
    ]);

    // Ambil nama perusahaan berdasarkan ID yang dipilih
    $companyName = null;
    if ($request->org_name) {
        $company = Company::find($request->org_name);
        $companyName = $company->nama;
    }

    // Buat user dengan role INVESTOR
    $user = User::create([
        'nama_depan' => $request->nama_depan,
        'nama_belakang' => $request->nama_belakang,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'INVESTOR',
    ]);

    // Buat investor terkait dengan nama perusahaan
    Investor::create([
        'org_name' => $companyName, // Simpan nama perusahaan, bukan ID
        'number_of_contacts' => $validated['number_of_contacts'],
        'location' => $validated['location'],
        'description' => $validated['description'],
        'departments' => $validated['departments'],
        'investment_stage' => $validated['investment_stage'],
        'user_id' => $user->id, // Link ke user yang baru dibuat
    ]);

    return redirect()->route('investors.index')->with('success', 'Investor and User created successfully.');
}



    public function edit($id)
    {
        $investor = Investor::findOrFail($id);
        $companies = Company::all(); // Ambil semua data perusahaan
    return view('investors.edit', compact('investor', 'companies'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'org_name' => 'nullable|exists:companies,id',
            'number_of_contacts' => 'nullable|integer|min:0',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'departments' => 'required|string|max:255',
            'investment_stage' => 'nullable|string|max:255',
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $investor = Investor::findOrFail($id);
        $user = $investor->user;

        // Ambil nama perusahaan berdasarkan ID yang dipilih
        $companyName = null;
        if ($request->org_name) {
            $company = Company::find($request->org_name);
            $companyName = $company->nama;
        }

        // Update investor
        $investor->update([
            'org_name' => $companyName, // Simpan nama perusahaan
            'number_of_contacts' => $validated['number_of_contacts'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'departments' => $validated['departments'],
            'investment_stage' => $validated['investment_stage'],
        ]);

        // Update user terkait
        $user->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
        ]);

        return redirect()->route('investors.index')->with('success', 'Investor and User updated successfully.');
    }



    public function destroy($id)
    {
        $investor = Investor::findOrFail($id);

        // Pastikan user terkait investor ada sebelum dihapus
        if ($investor->user) {
            $investor->user->delete(); // Hapus user terkait
        }

        // Hapus investor setelah menghapus user
        $investor->delete(); // Hapus investor

        return redirect()->route('investors.index')->with('success', 'Investor and User deleted successfully.');
    }
}
