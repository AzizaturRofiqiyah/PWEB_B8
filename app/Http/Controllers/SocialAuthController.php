<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendEmail;
use App\Models\Notifikasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {

            Log::error('Socialite Google Error: '.$e->getMessage());

            return redirect('/login')->with('error', 'Gagal masuk dengan Google. Pastikan koneksi internet stabil atau coba beberapa saat lagi.');
        }
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(12)),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($user);

        $notifikasi = Notifikasi::create([
            'judul' => 'Selamat Datang di SchoolarMate 🎉',
            'isi' => 'Terima kasih telah bergabung di ScholarMate — teman perjalananmu menuju beasiswa impian! Akunmu telah berhasil dibuat dan siap digunakan.
                        Sekarang kamu bisa langsung menjelajahi berbagai informasi beasiswa yang sesuai dengan minat, jenjang pendidikan, atau tujuan studimu. Jangan lupa lengkapi profilmu.
                        Ayo mulai langkah pertamamu menuju masa depan yang gemilang!',
            'link' => '/beasiswa',
            'tipe' => 'info',
            'user_id' => $user->id
        ]);

        $details = [
            'title' => 'Selamat Datang di ScholarMate 🎉',
            'body'  => 'Terima kasih telah bergabung di ScholarMate — teman perjalananmu menuju beasiswa impian! Akunmu telah berhasil dibuat dan siap digunakan.'
        ];

        Mail::to($user->email)->send(new SendEmail($details));

        return redirect('/dashboard');
    }
}
