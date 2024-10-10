<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepartementController extends Controller
{
    public function index () {
        $departments = Departement::all();
        return view('departements.index', compact('departments'));
    }

    public function create (){
        return view('departements.create');
    }

    public function store (Request $request){
        $request->validate([
            'name' => 'required|unique:departements'
        ]);

        Departement::create($request->all());
        return redirect()->route('departements.index')->with('success', 'Departement created successfully');
    }

    public function edit (Departement $departments){
        return view('departements.edit', compact('departement'));
    }   

    public function update (Request $request, Departement $departments){
        $request->validate([
            'name' => 'required|unique:departements'
        ]);

        $departments->update($request->all());
        return redirect()->route('departements.index')->with('success', 'Departement updated successfully');
    }

    public function destroy (Departement $departments){
        $departments->delete();
        return redirect()->route('departements.index')->with('success', 'Departement deleted successfully');
    }
}
