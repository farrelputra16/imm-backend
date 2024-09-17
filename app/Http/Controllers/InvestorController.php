<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the investors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investors = Investor::all();
        return view('investors.index', compact('investors'));
    }

    /**
     * Show the form for creating a new Investor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investors.create');
    }

    /**
     * Store a newly created Investor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'number_of_contacts' => 'required|integer|min:0',
            'number_of_investments' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'departments' => 'required|string|max:255',
        ]);

        Investor::create($validated);

        return redirect()->route('investors.index')
            ->with('success', 'Investor created successfully.');
    }

    /**
     * Display the specified Investor.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(Investor $investor)
    {
    return view('investors.show', compact('investor'));
    }


    /**
     * Show the form for editing the specified Investor.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investor = Investor::findOrFail($id);
        return view('investors.edit', compact('investor'));
    }

    /**
     * Update the specified Investor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'number_of_contacts' => 'required|integer|min:0',
            'number_of_investments' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'departments' => 'required|string|max:255',
        ]);

        $investor = Investor::findOrFail($id);
        $investor->update($validated);

        return redirect()->route('investors.index')
            ->with('success', 'Investor updated successfully.');
    }

    /**
     * Remove the specified Investor from storage.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investor = Investor::findOrFail($id);
        $investor->delete();

        return redirect()->route('investors.index')
            ->with('success', 'Investor deleted successfully.');
    }
}
