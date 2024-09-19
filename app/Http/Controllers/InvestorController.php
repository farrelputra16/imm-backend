<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\User;
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
        return view('investors.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'number_of_contacts' => 'required|integer|min:0',
            'number_of_investments' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'departments' => 'required|string|max:255',
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Buat user dengan role INVESTOR
        $user = User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'INVESTOR',
        ]);

        // Buat investor terkait
        Investor::create([
            'org_name' => $validated['org_name'],
            'number_of_contacts' => $validated['number_of_contacts'],
            'number_of_investments' => $validated['number_of_investments'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'departments' => $validated['departments'],
            'user_id' => $user->id, // Link ke user yang baru dibuat
        ]);

        return redirect()->route('investors.index')->with('success', 'Investor and User created successfully.');
    }

    public function edit($id)
    {
        $investor = Investor::findOrFail($id);
        return view('investors.edit', compact('investor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'number_of_contacts' => 'required|integer|min:0',
            'number_of_investments' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'departments' => 'required|string|max:255',
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Temukan investor dan user terkait
        $investor = Investor::findOrFail($id);
        $user = $investor->user;

        // Update investor
        $investor->update($validated);

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
