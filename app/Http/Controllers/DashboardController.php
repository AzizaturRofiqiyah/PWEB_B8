<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Konten;
use App\Models\Institution;
use Illuminate\Http\Request;
use App\Models\InformasiBeasiswa;
use App\Http\Controllers\Controller;
use App\Http\Middleware\superadmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        switch ($user->role)
        {
            case 'admin':
                return $this->admin();
            case 'super admin':
                return $this->superadmin();
            case 'user':
                return $this->user();
            default:
                return abort(403, 'Unauthorized');
        }
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function superadmin()
    {
        return view('super-admin.dashboard');
    }

    public function user()
    {
        $rekomendasibeasiswa = InformasiBeasiswa::where('status','sudah disetujui')->orderBy('created_at', 'desc')->take(3)->get();
        $rekomendasikonten = Konten::orderby('tanggal_upload')->take(3)->get();
        return view('user.dashboard',compact('rekomendasibeasiswa','rekomendasikonten'));
    }

    public function welcome()
    {
        $beasiswas = InformasiBeasiswa::where('status','sudah disetujui')->orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome',compact('beasiswas'));
    }
}
