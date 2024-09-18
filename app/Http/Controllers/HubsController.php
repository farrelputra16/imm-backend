<?php

namespace App\Http\Controllers;

use App\Models\Hubs;
use Illuminate\Http\Request;

class HubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data hubs dan menampilkannya
        $hubs = Hubs::all();
        return view('hubs.index', compact('hubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan form untuk membuat hubs baru
        return view('hubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'number_of_organizations' => 'required|integer',
            'number_of_people' => 'required|integer',
            'number_of_events' => 'required|integer',
            'rank' => 'required|integer',
            'top_investor_types' => 'nullable|string',
            'top_funding_types' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Membuat hubs baru
        Hubs::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('hubs.index')
                         ->with('success', 'Hub created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hubs $hub
     * @return \Illuminate\Http\Response
     */
    public function show(Hubs $hub)
    {
        // Menampilkan detail dari hub tertentu
        return view('hubs.show', compact('hub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hubs  $hub
     * @return \Illuminate\Http\Response
     */
    public function edit(Hubs $hub)
    {
        // Menampilkan form untuk mengedit hub
        return view('hubs.edit', compact('hub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hubs  $hub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hubs $hub)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'number_of_organizations' => 'required|integer',
            'number_of_people' => 'required|integer',
            'number_of_events' => 'required|integer',
            'rank' => 'required|integer',
            'top_investor_types' => 'nullable|string',
            'top_funding_types' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Mengupdate data hub
        $hub->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('hubs.index')
                         ->with('success', 'Hub updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hubs  $hub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hubs $hub)
    {
        // Menghapus hub dari database
        $hub->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('hubs.index')
                         ->with('success', 'Hub deleted successfully.');
    }
}

