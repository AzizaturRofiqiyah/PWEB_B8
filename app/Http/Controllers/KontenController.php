<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class KontenController extends Controller
{
    public function index()
    {
        $konten = Konten::latest()->paginate(10);
        return view('konten.index', compact('konten'));
    }

    public function show(Konten $konten)
    {
        return view('konten.show', compact('konten'));
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
        ],['judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'foto.required' => 'Foto harus diunggah',
            'foto.image' => 'File yang diunggah harus berupa gambar',
            'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg',
            'foto.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        $path = $request->file('foto')->store('konten', 's3');
        $path = supabase_public_url($path);
        $konten = Konten::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'foto' => $path,
            'user_id' => Auth::id(),
        ]);

        Notifikasi::create([
            'user_id' => Auth::id(),
            'judul' => 'Artikel Baru Dibuat',
            'isi' => 'Anda baru saja membuat artikel: ' . $validated['judul']
        ]);

        return redirect()->route('konten.index')
            ->with('success', 'Artikel berhasil dibuat!');
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
        ],[
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'foto.image' => 'File yang diunggah harus berupa gambar',
            'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg',
            'foto.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        $data = [
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi']
        ];

        if ($request->hasFile('foto')) {

            if ($konten->foto && Storage::disk('s3')->exists($konten->foto)) {
                Storage::disk('s3')->delete($konten->foto);
            }

            $path = $request->file('foto')->store('konten', 's3');
            $path = supabase_public_url($path);
            $data['foto'] = $path;
        }

        $konten->update($data);

        return redirect()->route('konten.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $konten = Konten::findOrFail($id);


        Storage::disk('s3')->delete($konten->foto);

        $konten->delete();

        return redirect()->route('konten.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
