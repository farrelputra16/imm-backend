<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('users')->get();
        foreach ($events as $event) {
            $event->cover_img = Storage::url('public/img/' . $event->cover_img);
            $event->hero_img = Storage::url('public/img/' . $event->hero_img);
        }
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $users = User::all();
        return view('events.create', compact('users'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $users = User::all();
        $eventUsers = $event->users->pluck('id')->toArray();
        return view('events.edit', compact('event', 'users', 'eventUsers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'allowed_participants' => 'nullable|string|max:255',
            'expected_participants' => 'nullable|integer',
            'fee_type' => 'required|in:Free,Paid',
            'organizer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_tlpn' => 'required|string|max:255',
            'topic' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'start' => 'required|date',
            'event_duration' => 'required|string|max:255',
            'users' => 'array|exists:users,id',
            'cover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'hero_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        if ($request->hasFile('cover_img')) {
            $coverImageName = time() . 'cover' . '.' . $request->cover_img->extension();
            $request->file('cover_img')->storeAs('public/img', $coverImageName);
            $validatedData['cover_img'] = $coverImageName;
        }

        if ($request->hasFile('hero_img')) {
            $heroImageName = time() . 'hero' . '.' . $request->hero_img->extension();
            $request->file('hero_img')->storeAs('public/img', $heroImageName);
            $validatedData['hero_img'] = $heroImageName;
        }

        $event = new Event();
        $event->fill($validatedData);
        $event->save();

        Log::info('Event created with ID: ' . $event->id);

        if (!empty($validatedData['users'])) {
            $event->users()->attach($validatedData['users']);
            foreach ($validatedData['users'] as $userId) {
                Log::info('User   ' . $userId . ' attached to event.');
            }
        } else {
            Log::info('No users attached to event.');
        }

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'allowed_participants' => 'nullable|string|max:255',
            'expected_participants' => 'nullable|integer',
            'fee_type' => 'required|in:Free,Paid',
            'organizer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_tlpn' => 'required|string|max:255',
            'topic' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'start' => 'required|date|after_or_equal:today',
            'event_duration' => 'required|regex:/^\d{2}\.\d{2} - \d{2}\.\d{2}$/',
            'users' => 'array|exists:users,id',
            'cover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'hero_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $event->update($validatedData);

        if ($request->hasFile('cover_img')) {
            if ($event->cover_img && Storage::disk('local')->exists('public/img/' . $event->cover_img)) {
                Storage::disk('local')->delete('public/img/' . $event->cover_img);
            }

            $coverImageName = time() . '.' . $request->cover_img->extension();
            $request->cover_img->storeAs('public/img', $coverImageName);
            $event->cover_img = $coverImageName;
        } elseif ($event->cover_img) {
            // Hapus gambar lama jika tidak ada perubahan gambar
            Storage::disk('local')->delete('public/img/' . $event->cover_img);
            $event->cover_img = null;
        }

        if ($request->hasFile('hero_img')) {
            if ($event->hero_img && Storage::disk('local')->exists('public/img/' . $event->hero_img)) {
                Storage::disk('local')->delete('public/img/' . $event->hero_img);
            }

            $heroImageName = time() . '.' . $request->hero_img->extension();
            $request->hero_img->storeAs('public/img', $heroImageName);
            $event->hero_img = $heroImageName;
        } elseif ($event->hero_img) {
            // Hapus gambar lama jika tidak ada perubahan gambar
            Storage::disk('local')->delete('public/img/' . $event->hero_img);
            $event->hero_img = null;
        }

        if (isset($validatedData['users'])) {
            $event->users()->sync($validatedData['users']);
        }

        $event->save();

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function view($id)
    {
        $event = Event::findOrFail($id);
        $users = User::all();
        $eventUsers = $event->users->pluck('id')->toArray();
        $event->cover_img = Storage::url('public/img/' . $event->cover_img);
        $event->hero_img = Storage::url('public/img/' . $event->hero_img);
        return view('events.view', compact('event', 'users', 'eventUsers'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->cover_img && Storage::disk('local')->exists('public/img/' . $event->cover_img)) {
            Storage::disk('local')->delete('public/img/' . $event->cover_img);
        }

        if ($event->hero_img && Storage::disk('local')->exists('public/img/' . $event->hero_img)) {
            Storage::disk('local')->delete('public/img/' . $event->hero_img);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
