<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Notifikasi;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::query()
            ->with('user')
            ->when(request('type'), fn($query) => $query->where('type', request('type')))
            ->when(request('status'), fn($query) => $query->where('status', request('status')))
            ->latest()
            ->paginate(10);

        return view('institutions.index', compact('institutions'));
    }

    public function create()
    {
        return view('institutions.create');
    }

    public function show(Institution $institution)
    {
        return view('institutions.show', compact('institution'));
    }

    public function approve(Institution $institution)
    {
        $institution->update(['status' => 'sudah disetujui']);
        $user = $institution->user()->first();
        $notifikasi = Notifikasi::create([
            'judul' => 'Institusi telah disetujui',
            'isi' => 'Sekarang institusi anda dapat mengajukan postingan beasiswa',
            'link' => '/beasiswa',
            'tipe' => 'success',
            'user_id' => $user->id
        ]);

        // Kirim email notifikasi

        $details = [
            'title' => 'Institusi telah disetujui',
            'body'  => 'Sekarang institusi anda dapat mengajukan postingan beasiswa'
        ];

        Mail::to($user->email)->send(new SendEmail($details));

        return back()->with('success', 'Institusi telah disetujui');
    }

}
