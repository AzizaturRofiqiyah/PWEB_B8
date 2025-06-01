<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
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
                return view('admin.dashboard');
            case 'super admin':
                return view('super-admin.dashboard');
            case 'user':
                return view('user.dashboard');
            default:
                return abort(403, 'Unauthorized');
        }
    }
}
