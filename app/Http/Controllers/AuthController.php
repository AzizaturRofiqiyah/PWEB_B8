<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendEmail;
use App\Models\Notifikasi;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth::check()){
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function showRegistrationForm(){
        if (auth::check()){
            return redirect('/dashboard');
        }
        return view('auth.register');
    }

    public function showRegistrationFormAdmin(){
        if (auth::check()){
            return redirect('/dashboard');
        }
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

        $details = [
            'title' => 'Selamat Datang di ScholarMate 🎉',
            'body'  => 'Terima kasih telah bergabung di ScholarMate — teman perjalananmu menuju beasiswa impian! Akunmu telah berhasil dibuat dan siap digunakan.
                        Sekarang kamu bisa langsung menjelajahi berbagai informasi beasiswa yang sesuai dengan minat, jenjang pendidikan, atau tujuan studimu. Jangan lupa lengkapi profilmu.
                        Ayo mulai langkah pertamamu menuju masa depan yang gemilang!'
        ];

        Mail::to($request->email)->send(new SendEmail($details));

        $notifikasi = Notifikasi::create([
            'judul' => 'Selamat Datang di SchoolarMate',
            'isi' => 'Terima kasih telah bergabung di ScholarMate — teman perjalananmu menuju beasiswa impian! Akunmu telah berhasil dibuat dan siap digunakan.
                        Sekarang kamu bisa langsung menjelajahi berbagai informasi beasiswa yang sesuai dengan minat, jenjang pendidikan, atau tujuan studimu. Jangan lupa lengkapi profilmu.
                        Ayo mulai langkah pertamamu menuju masa depan yang gemilang!',
            'link' => '/beasiswa',
            'tipe' => 'info',
            'user_id' => $user->id
        ]);

        return redirect('/dashboard');
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
        ],['name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'position.required' => 'Jabatan wajib diisi.',
            'institution_name.required' => 'Nama institusi wajib diisi.',
            'institution_type.required' => 'Jenis institusi wajib diisi.',
            'institution_address.required' => 'Alamat institusi wajib diisi.',
            'institution_website.url' => 'Format website tidak valid.',
            'institution_document.required' => 'Dokumen institusi wajib diunggah.',
            'institution_document.file' => 'Dokumen harus berupa file.',
            'institution_document.mimes' => 'Dokumen harus berupa file PDF, JPG, atau PNG.',
            'institution_document.max' => 'Ukuran dokumen maksimal 2MB.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan.']);

        $institution_document = $validated['institution_document'];

        $documentPath = Storage::disk('s3')->put('institution_document',$institution_document);

        $documentPath = supabase_public_url($documentPath);

        $institution = Institution::create([
            'name' => $validated['institution_name'],
            'type' => $validated['institution_type'],
            'address' => $validated['institution_address'],
            'website' => $validated['institution_website'],
            'document_path' => $documentPath,
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'role' => 'admin',
            'institution_id' => $institution['id']
        ]);

        $notification = Notifikasi::create([
            'judul'=> 'Pendaftaran institusi baru',
            'isi' => 'Akun bernama ' . $user->name ." mendaftarkan institusi baru "  . $institution->name ,
            'tipe' => 'info',
            'link' => '/institutions',
            'user_id' => User::findorFail(1)->id
        ]);

        //Email dan notifikasi super admin

        Auth::login($user);

        $details = [
            'title' => 'Selamat Datang di SchoolarMate',
            'body'  => 'Silahkan tunggu admin untuk melakukan verifikasi akun. Admin akan mengirim email saat akun telah di verifikasi'
        ];

        $notifikasi = Notifikasi::create([
            'judul' => 'Selamat Datang di SchoolarMate',
            'isi' => 'Silahkan tunggu admin untuk melakukan verifikasi akun. Admin akan mengirim email saat akun telah di verifikasi',
            'link' => '/dashboard',
            'tipe' => 'info',
            'user_id' => $user->id
        ]);

        Mail::to($validated['email'])->send(new SendEmail($details));

        //Email dan notifikasi admin

        return redirect('/dashboard')->with('success', 'Registrasi admin berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
