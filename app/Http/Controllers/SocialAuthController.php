<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
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

        return redirect('/dashboard');
    }
}
