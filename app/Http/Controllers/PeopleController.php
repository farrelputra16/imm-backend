<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the people.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::all();
        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating new people.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created person in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menambahkan validasi untuk kolom name
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Validasi untuk name
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

    /**
     * Display the specified person.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people = People::findOrFail($id);
        return view('people.show', compact('people'));
    }

    /**
     * Show the form for editing the specified person.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $people = People::findOrFail($id);
        return view('people.edit', compact('people'));
    }

    /**
     * Update the specified person in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Menambahkan validasi untuk kolom name
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Validasi untuk name
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

    /**
     * Remove the specified person from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::findOrFail($id);
        $people->delete();

        return redirect()->route('people.index')->with('success', 'People deleted successfully.');
    }
}
