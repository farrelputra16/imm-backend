<?php

namespace App\Http\Controllers;

use App\Models\FundingRound;
use App\Models\Company;
use App\Models\Investor;
use Illuminate\Http\Request;

class FundingRoundController extends Controller
{
    public function index()
    {
        $fundingRounds = FundingRound::with(['company', 'leadInvestor'])->get();
        return view('fundingrounds.index', compact('fundingRounds'));
    }

    public function create()
    {
        $companies = Company::all();
        $investors = Investor::all();
        return view('fundingrounds.create', compact('companies', 'investors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'target' => 'required|numeric',
            'announced_date' => 'required|date',
            'money_raised' => 'nullable|numeric',
            'lead_investor_id' => 'nullable',
            'funding_stage' => 'required',
            'description' => 'nullable|string',
        ]);

        FundingRound::create($request->all());

        return redirect()->route('fundingrounds.index')->with('success', 'Funding round created successfully.');
    }

    public function show(FundingRound $fundingRound)
    {
        return view('fundingrounds.show', compact('fundingRound'));
    }

    public function edit(FundingRound $fundingRound)
    {
        $companies = Company::all();
        $investors = Investor::all();
        return view('fundingrounds.edit', compact('fundingRound', 'companies', 'investors'));
    }

    public function update(Request $request, FundingRound $fundingRound)
    {
        $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'target' => 'required|numeric',
            'announced_date' => 'required|date',
            'money_raised' => 'nullable|numeric',
            'lead_investor_id' => 'nullable',
            'funding_stage' => 'required',
            'description' => 'nullable|string',
        ]);

        $fundingRound->update($request->all());

        return redirect()->route('fundingrounds.index')->with('success', 'Funding round updated successfully.');
    }

    public function destroy(FundingRound $fundingRound)
    {
        $fundingRound->delete();
        return redirect()->route('fundingrounds.index')->with('success', 'Funding round deleted successfully.');
    }
}
