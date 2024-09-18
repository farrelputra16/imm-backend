<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $people = People::all();
        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required|in:mentor,pekerja,konsultan',
            'primary_job_title' => 'required|string|max:255',
            'primary_organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'regions' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'linkedin_link' => 'nullable|url',
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'gmail' => 'required|email|max:255',
        ]);

        People::create($validatedData);

        return redirect()->route('people.index')->with('success', 'People created successfully.');
    }

    public function show($id)
    {
        $people = People::findOrFail($id);
        return view('people.show', compact('people'));
    }

    public function edit($id)
    {
        $people = People::findOrFail($id);
        return view('people.edit', compact('people'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role' => 'required|in:mentor,pekerja,konsultan',
            'primary_job_title' => 'required|string|max:255',
            'primary_organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'regions' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'linkedin_link' => 'nullable|url',
            'description' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'gmail' => 'required|email|max:255',
        ]);

        $people = People::findOrFail($id);
        $people->update($validatedData);

        return redirect()->route('people.index')->with('success', 'People updated successfully.');
    }

    public function destroy($id)
    {
        $people = People::findOrFail($id);
        $people->delete();

        return redirect()->route('people.index')->with('success', 'People deleted successfully.');
    }
}
