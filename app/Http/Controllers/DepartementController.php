<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepartementController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments'
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }

    public function edit(Department $departments)
    {
        return view('departments.edit', compact('departement'));
    }

    public function update(Request $request, Department $departments)
    {
        $request->validate([
            'name' => 'required|unique:departments'
        ]);

        $departments->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    public function destroy(Department $departments)
    {
        $departments->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}
