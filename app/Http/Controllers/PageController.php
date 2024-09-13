<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PageController extends Controller
{
    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        $page = Page::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'img' => $imageName, // Save image paths as a semicolon-separated string
        ]);

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified page.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.view', compact('page'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow null for img
        ]);

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($page->img) {
                Storage::delete('images/' . $page->img);
            }
            // Simpan gambar yang baru
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $page->img = $imageName;
        }

        // Update nama dan konten
        $page->name = $request->name;
        $page->content = $request->content;
        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }


    // public function update(Request $request, $id)
    // {
    //     $page = Page::findOrFail($id);

    //     $request->validate([
    //         'name' => 'required',
    //         'content' => 'required',
    //         'imgupload.*' => 'nullable|image|max:5000',
    //     ]);

    //     $imagePaths = [];

    //     if ($request->hasFile('imgupload')) {
    //         foreach ($request->file('imgupload') as $image) {
    //             $originalName = $image->getClientOriginalName();
    //             $path = $image->storeAs('public/img/pages', $originalName);
    //             $imagePaths[] = $path;
    //         }

    //         // Update images only if new images are uploaded
    //         $page->img = implode(';', $imagePaths);
    //     }

    //     // Update other fields
    //     $page->name = $request->input('name');
    //     $page->content = $request->input('content');
    //     $page->save();

    //     return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    // }


    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        // Hapus gambar terkait jika ada
        $imagePaths = explode(';', $page->img);
        foreach ($imagePaths as $path) {
            Storage::delete($path);
        }

        // Hapus halaman dari database
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }
}
