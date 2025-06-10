<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\InformasiBeasiswa;
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
        'user_id' => Auth::id()
    ]);

    $comment->load('user');

    if ($request->ajax() || $request->wantsJson()) {
        $commentHtml = view('beasiswa._comment', compact('comment'))->render();
        return response()->json([
            'success' => true,
            'comment_html' => $commentHtml
        ]);
    }

    return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function destroy(Komentar $komentar)
    {
        $komentar->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}
