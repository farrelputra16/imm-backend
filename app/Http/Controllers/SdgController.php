<?php

namespace App\Http\Controllers;

use App\Models\Sdg;
use Illuminate\Http\Request;

class SdgController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sdgs = Sdg::all();
        return view('sdgs.index', compact('sdgs'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sdgs.create');
    }

    public function view($id)
    {
        $sdg = Sdg::findOrFail($id);
        return view('sdgs.view', compact('sdg'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        $sdg = Sdg::create([
            'img' => $imageName, 
            'name' => $request->input('name'),
            'order' => $request->input('order'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('sdgs.index')
            ->with('success', 'SDG created successfully.');
    }

    /**
     * Display the specified category.
     *
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function show(Sdg $sdg)
    {
        return view('sdgs.show', compact('sdg'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sdg = Sdg::findOrFail($id);
        return view('sdgs.edit', compact('sdg'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sdg = Sdg::findOrFail($id);

        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Update the fields that are provided
        $sdg->name = $request->input('name');
        $sdg->order = $request->input('order');
        $sdg->description = $request->input('description');

        // Handle image update if new image is provided
        if ($request->hasFile('img')) {
            $request->validate([
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
            ]);

            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $sdg->img = $imageName;
        }

        $sdg->save();

        return redirect()->route('sdgs.index')->with('success', 'SDG updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Sdg  $sdg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sdg = Sdg::findOrFail($id);

        $sdg->delete();

        return redirect()->route('sdgs.index')
            ->with('success', 'SDG deleted successfully.');
    }
}
