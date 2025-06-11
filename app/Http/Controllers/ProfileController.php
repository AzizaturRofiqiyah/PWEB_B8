<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institution;

class ProfileController extends Controller
{
    public function show()
    {

        $user = auth()->user();

        if ($user && $user->role === 'user'){
            return view('Profile.show', compact('user'));
        }
        else if($user && $user->role === 'admin'){
            $institution = Institution::where('id',$user->institution_id)->first(); // Mengambil institution berdasarkan institution_id dari user yang sedang login
            return view('Profile.showadmin',compact('user','institution'));
        }
        else if($user && $user->role === 'super admin'){
            return view('Profile.showsuperadmin',compact('user'));
        }

    }
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        try {
            // Update basic profile info
            $user->name = $validated['name'];
            $user->email = $validated['email'];

            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile: '.$e->getMessage());
        }
    }
}
