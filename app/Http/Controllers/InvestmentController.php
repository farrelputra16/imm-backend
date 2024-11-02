<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index()
    {
        // Mengambil semua data investasi dengan relasi investor, company, dan project
        $investments = Investment::with(['investor', 'company'])->get();

        return view('investments.index', compact('investments'));
    }

    public function approve($id)
    {
        $investment = Investment::find($id);
        $investment->status = 'approved';
        $investment->save();

        return redirect()->route('investments.index')->with('success', 'Investasi berhasil disetujui.');
    }

    public function reject($id)
    {
        $investment = Investment::find($id);
        $investment->status = 'rejected';
        $investment->save();

        return redirect()->route('investments.index')->with('success', 'Investasi berhasil ditolak.');
    }

    public function destroy($id)
    {
        $investment = Investment::find($id);
        $investment->delete();

        return redirect()->route('investments.index')->with('success', 'Investasi berhasil dihapus.');
    }

    public function show($id)
    {
        $investment = Investment::find($id);
        return view('investments.show', compact('investment'));
    }

    public function edit($id)
    {
        $investment = Investment::find($id);
        return view('investments.edit', compact('investment'));
    }
}
