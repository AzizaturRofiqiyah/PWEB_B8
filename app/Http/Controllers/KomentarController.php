<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
