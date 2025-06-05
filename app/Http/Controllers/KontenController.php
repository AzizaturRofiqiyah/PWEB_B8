<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    public function index()
    {
        $konten = Konten::paginate(10);
        return view('konten.index',compact('konten'));
    }

    public function show(Konten $konten)
    {
        return view('konten.show',compact('konten'));
    }

    public function create()
    {
        return view('konten.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('foto')->store('konten', 'public');

        Konten::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'foto' => $path,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('konten.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function edit($id)
    {
        $konten = Konten::findOrFail($id);
        return view('konten.edit', compact('konten'));
    }

    public function update(Request $request, $id)
    {
        $konten = Konten::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi']
        ];

        if ($request->hasFile('foto')) {
            // Delete old image
            Storage::disk('public')->delete($konten->foto);

            // Store new image
            $path = $request->file('foto')->store('konten', 'public');
            $data['foto'] = $path;
        }

        $konten->update($data);

        return redirect()->route('konten.index')->with('success', 'Artikel berhasil diperbarui!');
    }

}
