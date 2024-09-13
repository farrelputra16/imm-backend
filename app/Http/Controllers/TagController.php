<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }
    public function view($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.view', compact('tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $tag = Tag::create([
            'nama' => $request->input('nama'),
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'img' => 'nullable|image|max:5000',
    //     ]);

    //     $tag = new Tag();

    //     $tag->nama = $request->input('nama');

    //     if ($request->hasFile('img')) {
    //         $originalName = $request->img->getClientOriginalName();
    //         $path = $request->img->storeAs('public/img/tags', $originalName);
    //         $tag->img = Storage::url($path);
    //     }

    //     $tag->save();

    //     return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    // }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    // public function update(Request $request, $id)
    // {
    //     $tag = Tag::findOrFail($id);

    //     $request->validate([
    //         'nama' => 'required',
    //         'img' => 'nullable|image|max:5000',
    //     ]);

    //     $tag->nama = $request->input('nama');

    //     if ($request->hasFile('img')) {
    //         $originalName = $request->img->getClientOriginalName();
    //         $path = $request->img->storeAs('public/img/tags', $originalName);
    //         $tag->img = Storage::url($path);
    //     }

    //     $tag->save();

    //     return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    // }

    
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'nama' => 'required',
        ]);

        // Update nama dan konten
        $tag->nama = $request->nama;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        if ($tag->img) {
            Storage::delete($tag->img);
        }
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
