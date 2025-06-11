<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Notifikasi;
use App\Models\Institution;
use Illuminate\Http\Request;
use App\Models\InformasiBeasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InformasiBeasiswaController extends Controller
{
    public function index(Request $request)
    {
        $institution = null;
        if (Auth::user()?->institution_id) {
            $institution = Institution::find(Auth::user()->institution_id);
        }
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

        return view('beasiswa.index', compact('beasiswas','institution'));
    }


    public function show(InformasiBeasiswa $beasiswa)
    {
        $beasiswa->load(['komentar' => function($q) {
        $q->orderBy('created_at', 'asc')->with('user');
        }]);
        return view('beasiswa.show',compact('beasiswa'));
    }

    public function approve(InformasiBeasiswa $beasiswa)
    {
        $beasiswa->update(['status' => 'sudah disetujui']);
        $user = $beasiswa->user()->first();
        $notifikasi = Notifikasi::create([
            'judul' => 'Beasiswa telah disetujui',
            'isi' => 'Beasiswa anda telah disetujui dan dapat dilihat di halaman beasiswa.',
            'link' => '/beasiswa/' . $beasiswa->id,
            'tipe' => 'success',
            'user_id' => $user->id
        ]);

        // Kirim email notifikasi

        $details = [
            'title' => 'Beasiswa Disetujui 🎉',
            'body'  => 'Beasiswa Anda telah disetujui. Silakan cek halaman beasiswa untuk detail lebih lanjut.'
        ];

        Mail::to($user->email)->send(new SendEmail($details));

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
        ],[
            'judul.required' => 'Judul wajib diisi.',
            'deskripsi_singkat.required' => 'Deskripsi singkat wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deadline.required' => 'Deadline wajib diisi.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berupa file JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'jenis.required' => 'Jenis beasiswa wajib dipilih.',
            'wilayah.required' => 'Wilayah beasiswa wajib dipilih.',
            'link_pendaftaran.required' => 'Link pendaftaran wajib diisi.',
            'link_pendaftaran.url' => 'Format link pendaftaran tidak valid.'
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
        ],[
            'judul.required' => 'Judul wajib diisi.',
            'deskripsi_singkat.required' => 'Deskripsi singkat wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deadline.required' => 'Deadline wajib diisi.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berupa file JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'jenis.required' => 'Jenis beasiswa wajib dipilih.',
            'wilayah.required' => 'Wilayah beasiswa wajib dipilih.',
            'link_pendaftaran.required' => 'Link pendaftaran wajib diisi.',
            'link_pendaftaran.url' => 'Format link pendaftaran tidak valid.'
        ]);

        $data = $validated;

        if ($request->hasFile('foto')) {

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

        if ($beasiswa->foto) {
            Storage::disk('s3')->delete($beasiswa->foto);
        }

        $beasiswa->delete();

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa berhasil dihapus!');
    }
}
