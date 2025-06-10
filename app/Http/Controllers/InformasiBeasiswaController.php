<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiBeasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformasiBeasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = InformasiBeasiswa::query();

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('wilayah')) {
            $query->where('wilayah', $request->wilayah);
        }

        if (auth::user()?->role === 'user' || auth::check() === null)
        {
            $beasiswas = $query->where('status','sudah disetujui')->orderBy('created_at', 'desc')->paginate(9);
        }
        else if( auth::user()?->role === 'admin' || auth::check() === null ) {
            $beasiswas = $query->where('user_id',auth::user()->id)->orderBy('created_at', 'desc')->paginate(9);
        }
        else if (auth::user()?->role === 'super admin'){
            $beasiswas = $query->orderBy('created_at', 'desc')->paginate(9);
        }
        else{
            $beasiswas = $query->where('status','sudah disetujui')->orderBy('created_at', 'desc')->paginate(9);
        }

        return view('beasiswa.index', compact('beasiswas'));
    }


    public function show(InformasiBeasiswa $beasiswa)
    {
        return view('beasiswa.show',compact('beasiswa'));
    }

    public function approve(InformasiBeasiswa $beasiswa)
    {
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
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('foto')) {
            $link = $request->file('foto')->store('beasiswa', 's3');
            $link = supabase_public_url($link);
            $data['foto'] = $link;
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
                Storage::disk('s3')->delete($beasiswa->foto);
            }
            $link = $request->file('foto')->store('beasiswa', 's3');
            $link = supabase_public_url($link);
            $data['foto'] = $link;
        }

        $beasiswa->update($data);

        return redirect()->route('beasiswa.show', $beasiswa->id)->with('success', 'Beasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $beasiswa = InformasiBeasiswa::findOrFail($id);

        // Delete image if exists
        if ($beasiswa->foto) {
            Storage::disk('s3')->delete($beasiswa->foto);
        }

        $beasiswa->delete();

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil dihapus!');
    }
}
