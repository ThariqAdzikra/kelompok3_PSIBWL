<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman otentikasi Google.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Menangani callback dari Google setelah otentikasi.
     * Di sinilah proses registrasi dan login terjadi.
     */
    public function callback()
    {
        try {
            // 1. Ambil data pengguna dari Google
            $googleUser = Socialite::driver('google')->user();

            // 2. Ambil email admin dari file .env
            $adminEmail = env('ADMIN_EMAIL');

            // 3. Cari atau buat pengguna baru di database
            // updateOrCreate akan mencari user berdasarkan google_id.
            // Jika ditemukan, data akan di-update.
            // Jika tidak, user baru akan dibuat.
            $user = User::updateOrCreate(
                [
                    'google_id' => $googleUser->getId(),
                ],
                [
                    'email' => $googleUser->getEmail(),
                    'nama' => $googleUser->getName(),
                    'foto_profil' => $googleUser->getAvatar(),
                    'role' => ($googleUser->getEmail() === $adminEmail) ? 'admin' : 'customer', // Tentukan role
                    'last_login' => now(), // Catat waktu login terakhir
                ]
            );

            // 4. Login-kan pengguna tersebut ke dalam sistem
            Auth::login($user, true); // `true` untuk fitur "remember me"

            // 5. Arahkan pengguna ke halaman dashboard atau halaman utama
            return redirect('/dashboard');

        } catch (\Throwable $th) {
            // Jika terjadi error, kembalikan ke halaman login dengan pesan error
            return redirect('/login')->withErrors(['msg' => 'Terjadi kesalahan saat login dengan Google.']);
        }
    }
}