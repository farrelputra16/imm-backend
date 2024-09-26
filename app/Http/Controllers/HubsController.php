<?php

namespace App\Http\Controllers;

use App\Models\Hubs;
use App\Models\Company;
use App\Models\People;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $hubs = Hubs::with(['companies', 'people', 'events', 'user'])->get();
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
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'rank' => 'nullable|integer',
            'top_investor_types' => 'nullable|string',
            'top_funding_types' => 'nullable|string',
            'description' => 'nullable|string',
            // Validasi untuk relasi jika ada
            'company_ids' => 'nullable|array',
            'company_ids.*' => 'exists:companies,id',
            'people_ids' => 'nullable|array',
            'people_ids.*' => 'exists:people,id',
            'event_ids' => 'nullable|array',
            'event_ids.*' => 'exists:events,id',
        ]);

        // Membuat hub baru dengan status 'pending' dan user_id
        $hub = Hubs::create([
            'name' => $request->name,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'rank' => $request->rank,
            'top_investor_types' => $request->top_investor_types,
            'top_funding_types' => $request->top_funding_types,
            'description' => $request->description,
            'status' => 'pending',
            'user_id' => auth()->id(), // Menyimpan ID pengguna yang sedang login
        ]);

        // Menyimpan relasi many-to-many jika ada
        $hub->companies()->attach($request->input('company_ids', []));
        $hub->people()->attach($request->input('people_ids', []));
        $hub->events()->attach($request->input('event_ids', []));

        // Redirect dengan pesan sukses
        return redirect()->route('hubs.index')->with('success', 'Pengajuan hub Anda telah diterima dan menunggu persetujuan.');
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

    /**
     * Menyetujui hubs.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $hub = Hubs::findOrFail($id);
        $hub->status = 'approved';
        $hub->save();

        Log::info('Hubs ID ' . $hub->id . ' disetujui oleh admin.');

        return redirect()->route('hubs.index')->with('success', 'Hub berhasil disetujui.');
    }

    /**
     * Menolak hubs.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject($id)
    {
        $hub = Hubs::findOrFail($id);
        $hub->status = 'rejected';
        $hub->save();

        Log::info('Hubs ID ' . $hub->id . ' ditolak oleh admin.');

        return redirect()->route('hubs.index')->with('success', 'Hub berhasil ditolak.');
    }
}
