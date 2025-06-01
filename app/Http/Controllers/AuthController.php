<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function showRegistrationForm(){
        return view('auth.register');
    }

    public function showRegistrationFormAdmin(){
        return view('auth.register-admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboarduser');
    }

    public function registerAdmin(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|max:20',
        'position' => 'required|string|max:100',
        'institution_name' => 'required|string|max:255',
        'institution_type' => 'required|string',
        'institution_address' => 'required|string',
        'institution_website' => 'nullable|url',
        'institution_document' => 'required|file|mimes:pdf,jpg,png|max:2048',
        'password' => 'required|string|min:8|confirmed',
        'terms' => 'required|accepted',
    ]);

    $institution_document = $validated['institution_document'];

    $documentPath = Storage::disk('s3')->put('institution_document',$institution_document);

    $documentPath = supabase_public_url($documentPath);

    // dd($documentPath);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'phone' => $validated['phone'],
        'role' => 'admin',
    ]);

    $institution = Institution::create([
        'name' => $validated['institution_name'],
        'type' => $validated['institution_type'],
        'address' => $validated['institution_address'],
        'website' => $validated['institution_website'],
        'document_path' => $documentPath,
    ]);

    $user->institution()->associate($institution);
    $user->save();

    Auth::login($user);

    return redirect('/dashboard')->with('success', 'Registrasi admin berhasil!');
}

}
