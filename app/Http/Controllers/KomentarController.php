<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Komentar;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'komentar' => 'required|string|max:1000',
            'informasi_beasiswa_id' => 'required|exists:informasi_beasiswas,id'
        ]);

        $comment = Komentar::create([
            'komentar' => $validated['komentar'],
            'informasi_beasiswa_id' => $validated['informasi_beasiswa_id'],
            'user_id' => Auth::user()->id
        ]);

        $informasi_beasiswa = $comment->informasiBeasiswa()->first();
        $user = $informasi_beasiswa->user()->first();
        $notifikasi = Notifikasi::create([
            'judul' => 'Komentar baru pada beasiswa',
            'isi' => 'Komentar baru telah ditambahkan pada beasiswa yang anda posting.',
            'link' => '/beasiswa/' . $informasi_beasiswa->id,
            'tipe' => 'info',
            'user_id' => $user->id
        ]);
        // Kirim email notifikasi

        $details = [
            'title' => 'Komentar baru pada beasiswa',
            'body'  => 'Komentar baru telah ditambahkan pada beasiswa yang anda posting.'
        ];
        Mail::to($user->email)->send(new SendEmail($details));

        if($comment){
            return back()->with('success', 'Komentar berhasil ditambahkan!');
        }
        else{
            return back()->error()->with('content', 'eror');
        }

    }

    public function destroy(Komentar $comment)
    {
        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus!');
    }
}
