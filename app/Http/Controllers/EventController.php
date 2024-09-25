<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Import Log facade

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('users')->get();
        // Loop untuk mendapatkan setiap image yang disimpan di storage untuk cover dan hero
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
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'topic' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
            'deadline' => 'required|date',
            'users' => 'array|exists:users,id',
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'hero_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        // Handle file upload menggatinya agar di store di storage supaya bisa diakses dari frontend
        $coverImageName = time() . 'cover' . '.' . $request->cover_img->extension();
        // $request->cover_img->move(public_path('img'), $coverImageName);
        $request->file('cover_img')->storeAs('public/img', $coverImageName);


        $heroImageName = time() . 'hero' . '.' . $request->hero_img->extension();
        // $request->hero_img->move(public_path('img'), $heroImageName);
        $request->file('hero_img')->storeAs('public/img', $heroImageName);

        // Create and save the event
        $event = new Event();
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->topic = $validatedData['topic'];
        $event->location = $validatedData['location'];
        $event->start = $validatedData['start'];
        $event->end = $validatedData['end'];
        $event->deadline = $validatedData['deadline'];
        $event->cover_img = $coverImageName;
        $event->hero_img = $heroImageName;

        // Save the event and log its ID
        $event->save();
        Log::info('Event created with ID: ' . $event->id);

        // Attach users to the event
        if (!empty($validatedData['users'])) {
            foreach ($validatedData['users'] as $userId) {
                $event->users()->attach($userId);
                Log::info('User ' . $userId . ' attached to event.');
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
            'topic' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'cover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'hero_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
            'start' => 'required|date',
            'end' => 'required|date',
            'deadline' => 'required|date',
            'users' => 'array|exists:users,id',
        ]);

        // Update the event with validated data
        $event->update($validatedData);

        // Handle image update if provided
        if ($request->hasFile('cover_img')) {
            // Delete old image if exists
            if ($event->cover_img && file_exists(public_path('img/' . $event->cover_img))) {
                unlink(public_path('img/' . $event->cover_img));
            }

            // Move and save new image
            $coverImageName = time() . '.' . $request->cover_img->extension();
            $request->cover_img->move(public_path('img'), $coverImageName);
            $event->cover_img = $coverImageName;
        }

        if ($request->hasFile('hero_img')) {
            // Delete old image if exists
            if ($event->hero_img && file_exists(public_path('img/' . $event->hero_img))) {
                unlink(public_path('img/' . $event->hero_img));
            }

            // Move and save new image
            $heroImageName = time() . '.' . $request->hero_img->extension();
            $request->hero_img->move(public_path('img'), $heroImageName);
            $event->hero_img = $heroImageName;
        }

        // Sync users associated with the event
        if (isset($validatedData['users'])) {
            $event->users()->sync($validatedData['users']);
        }

        // Save the updated event
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

        // Cek dan hapus file gambar cover jika ada
        if ($event->cover_img && Storage::disk('local')->exists('public/img/' . $event->cover_img)) {
            Storage::disk('local')->delete('public/img/' . $event->cover_img);
        }

        // Cek dan hapus file gambar hero jika ada
        if ($event->hero_img && Storage::disk('local')->exists('public/img/' . $event->hero_img)) {
            Storage::disk('local')->delete('public/img/' . $event->hero_img);
        }

        // Hapus event dari database
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

}