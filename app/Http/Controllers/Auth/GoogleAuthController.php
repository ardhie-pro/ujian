<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cari user berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // Update google_id jika belum ada (user terdaftar via email biasa sebelumnya)
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->id,
                        'google_token' => $googleUser->token,
                    ]);
                }
                Auth::login($user);
            } else {
                // Buat user baru (Registrasi via Google)
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'google_token' => $googleUser->token,
                    'password' => Hash::make(Str::random(16)), // Password random karena login via google
                    'status' => 'aktif',
                    'role' => 'user',
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/dashboard');

        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Gagal login menggunakan Google: ' . $e->getMessage());
        }
    }
}

