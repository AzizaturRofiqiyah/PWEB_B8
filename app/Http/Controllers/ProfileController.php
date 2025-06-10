<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institution;

class ProfileController extends Controller
{
    public function show()
    {
        // Try to get user from database (ID 1)
        $user = auth()->user();

        if (auth()->user()->role === 'user'){
            return view('Profile.show', compact('user'));
        }
        else if(auth()->user()->role === 'admin'){
            $user = auth()->user(); // Mengambil institution dari user yang sedang login
            $institution = Institution::where('id',$user->institution_id)->first(); // Mengambil institution berdasarkan institution_id dari user yang sedang login
            return view('Profile.showadmin',compact('user','institution'));
        }
        else if(auth()->user()->role === 'super admin'){
            return view('Profile.showsuperadmin',compact('user'));
        }

    }
}
