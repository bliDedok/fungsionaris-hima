<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('program')->orderByDesc('id')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $programs = Program::orderBy('name')->get();
        $categories = Gallery::select('category')->distinct()->pluck('category')->toArray();
        return view('admin.galleries.form', compact('programs', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'program_id' => 'nullable|exists:programs,id',
            'category' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|max:4096',
            'caption' => 'nullable|string|max:500',
        ]);

        $data['image'] = $request->file('image')->store('galleries', 'public');
        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        $programs = Program::orderBy('name')->get();
        $categories = Gallery::select('category')->distinct()->pluck('category')->toArray();
        return view('admin.galleries.form', compact('gallery', 'programs', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'program_id' => 'nullable|exists:programs,id',
            'category' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
            'caption' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil dihapus.');
    }
}
