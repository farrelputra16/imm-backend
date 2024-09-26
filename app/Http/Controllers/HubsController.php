<?php

namespace App\Http\Controllers;

use App\Models\Hubs;
use App\Models\Company;
use App\Models\People;
use App\Models\Event;
use Illuminate\Http\Request;

class HubsController extends Controller
{
    /**
     * Menampilkan daftar hubs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data hubs beserta relasinya
        $hubs = Hubs::with(['companies', 'people', 'events'])->get();
        return view('hubs.index', compact('hubs'));
    }

    /**
     * Menampilkan form untuk membuat hubs baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil data companies, people, dan events untuk dropdown
        $companies = Company::all();
        $people = People::all();
        $events = Event::all();

        return view('hubs.create', compact('companies', 'people', 'events'));
    }

    /**
     * Menyimpan hubs baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'rank' => 'required|integer',
            'top_investor_types' => 'nullable|string',
            'top_funding_types' => 'nullable|string',
            'description' => 'nullable|string',
            'company_ids' => 'array',
            'company_ids.*' => 'exists:companies,id',
            'people_ids' => 'array',
            'people_ids.*' => 'exists:people,id',
            'event_ids' => 'array',
            'event_ids.*' => 'exists:events,id',
        ]);

        // Membuat hubs baru
        $hubs = Hubs::create($request->only([
            'name',
            'provinsi',
            'kota',
            'rank',
            'top_investor_types',
            'top_funding_types',
            'description',
        ]));

        // Menyimpan relasi many-to-many
        $hubs->companies()->attach($request->input('company_ids', []));
        $hubs->people()->attach($request->input('people_ids', []));
        $hubs->events()->attach($request->input('event_ids', []));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('hubs.index')
                         ->with('success', 'Hubs berhasil dibuat.');
    }

    /**
     * Menampilkan detail hubs tertentu.
     *
     * @param  \App\Models\Hubs $hubs
     * @return \Illuminate\Http\Response
     */
    public function show(Hubs $hubs)
    {
        // Memuat relasi terkait
        $hubs->load(['companies', 'people', 'events']);
        return view('hubs.show', compact('hubs'));
    }

    /**
     * Menampilkan form untuk mengedit hubs.
     *
     * @param  \App\Models\Hubs  $hubs
     * @return \Illuminate\Http\Response
     */
    public function edit(Hubs $hubs)
    {
        // Mengambil data untuk dropdown
        $companies = Company::all();
        $people = People::all();
        $events = Event::all();

        // Memuat relasi terkait
        $hubs->load(['companies', 'people', 'events']);

        return view('hubs.edit', compact('hubs', 'companies', 'people', 'events'));
    }

    /**
     * Mengupdate data hubs di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hubs  $hubs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hubs $hubs)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'rank' => 'required|integer',
            'top_investor_types' => 'nullable|string',
            'top_funding_types' => 'nullable|string',
            'description' => 'nullable|string',
            'company_ids' => 'array',
            'company_ids.*' => 'exists:companies,id',
            'people_ids' => 'array',
            'people_ids.*' => 'exists:people,id',
            'event_ids' => 'array',
            'event_ids.*' => 'exists:events,id',
        ]);

        // Mengupdate data hubs
        $hubs->update($request->only([
            'name',
            'provinsi',
            'kota',
            'rank',
            'top_investor_types',
            'top_funding_types',
            'description',
        ]));

        // Sinkronisasi relasi many-to-many
        $hubs->companies()->sync($request->input('company_ids', []));
        $hubs->people()->sync($request->input('people_ids', []));
        $hubs->events()->sync($request->input('event_ids', []));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('hubs.index')
                         ->with('success', 'Hubs berhasil diperbarui.');
    }

    /**
     * Menghapus hubs dari database.
     *
     * @param  \App\Models\Hubs  $hubs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hubs $hubs)
    {
        // Menghapus hubs
        $hubs->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('hubs.index')
                         ->with('success', 'Hubs berhasil dihapus.');
    }
}
