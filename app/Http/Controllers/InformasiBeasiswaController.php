<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiBeasiswa;
use Illuminate\Support\Facades\Storage;

class InformasiBeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = InformasiBeasiswa::paginate(10);
        return view('beasiswa.index',compact('beasiswas'));
    }

     public function show(InformasiBeasiswa $beasiswa)
    {
        return view('beasiswa.show',compact('beasiswa'));
    }

    public function approve($id)
    {
        $beasiswa = InformasiBeasiswa::findOrFail($id);
        $beasiswa->update(['status' => 'sudah disetujui']);

        return back()->with('success', 'Beasiswa telah disetujui');
    }

    public function create()
    {
        return view('beasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deadline' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jenis' => 'required|in:Penuh,Parsial',
            'wilayah' => 'required|in:Dalam Negeri,Luar Negeri,Dalam/Luar Negeri',
            'link_pendaftaran' => 'required|url'
        ]);

        $data = $validated;
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('beasiswa', 'public');
        }

        InformasiBeasiswa::create($data);

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $beasiswa = InformasiBeasiswa::findOrFail($id);
        return view('beasiswa.edit', compact('beasiswa'));
    }

    public function update(Request $request, $id)
    {
        $beasiswa = InformasiBeasiswa::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deadline' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jenis' => 'required|in:Penuh,Parsial',
            'wilayah' => 'required|in:Dalam Negeri,Luar Negeri,Dalam/Luar Negeri',
            'link_pendaftaran' => 'required|url'
        ]);

        $data = $validated;

        if ($request->hasFile('foto')) {
            // Delete old image if exists
            if ($beasiswa->foto) {
                Storage::disk('public')->delete($beasiswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('beasiswa', 'public');
        }

        $beasiswa->update($data);

        return redirect()->route('beasiswa.show', $beasiswa->id)->with('success', 'Beasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $beasiswa = InformasiBeasiswa::findOrFail($id);

        // Delete image if exists
        if ($beasiswa->foto) {
            Storage::disk('public')->delete($beasiswa->foto);
        }

        $beasiswa->delete();

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil dihapus!');
    }
}
