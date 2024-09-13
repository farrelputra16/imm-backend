<?php

namespace App\Http\Controllers;

use App\Models\CompanyIncome;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyIncomeController extends Controller
{
    public function selectCompany()
    {
        $companies = Company::all();
        return view('company_income.select_company', compact('companies'));
    }

    public function index(Request $request)
    {
        $selectedCompany = null;
        $companyIncomes = collect();

        if ($request->has('company_id')) {
            $selectedCompany = Company::findOrFail($request->company_id);
            $companyIncomes = $selectedCompany->incomes;
        }

        return view('company_income.index', compact('selectedCompany', 'companyIncomes'));
    }

    public function create($company_id)
    {
        $company = Company::findOrFail($company_id);
        return view('company_income.create', compact('company'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'pengirim' => 'required|string',
            'bank_asal' => 'required|string',
            'bank_tujuan' => 'required|string',
            'jumlah_hibah' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
        ]);

        CompanyIncome::create($request->all());

        return redirect()->route('company-income.index', ['company_id' => $request->company_id])
            ->with('success', 'Income added successfully.');
    }

    public function show($id)
    {
        $income = CompanyIncome::findOrFail($id);
        return view('company_income.view', compact('income'));
    }

    public function edit($id)
    {
        $income = CompanyIncome::findOrFail($id);
        return view('company_income.edit', compact('income'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'date' => 'required|date',
        'pengirim' => 'required|string',
        'bank_asal' => 'required|string',
        'bank_tujuan' => 'required|string',
        'jumlah_hibah' => 'required|numeric',
    ]);

    $income = CompanyIncome::findOrFail($id);
    $income->update($request->all());

    return redirect()->route('company-income.index', ['company_id' => $income->company_id])->with('success', 'Income updated successfully.');
}


    public function destroy($id)
    {
        $income = CompanyIncome::findOrFail($id);
        $income->delete();

        return redirect()->route('company-income.index', ['company_id' => $income->company_id])->with('success', 'Income deleted successfully.');
    }
}
