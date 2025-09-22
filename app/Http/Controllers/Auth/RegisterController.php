<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $googleUserData = session('google_user_data');
        if (!$googleUserData) {
            return redirect()->route('login')->withErrors(['msg' => 'Untuk mendaftar, silakan mulai dengan verifikasi Google.']);
        }
        return view('auth.register', compact('googleUserData'));
    }

    public function register(Request $request)
    {
        $googleUserData = session('google_user_data');
        if (!$googleUserData) {
            return redirect()->route('login')->withErrors(['msg' => 'Sesi registrasi berakhir. Coba lagi.']);
        }

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $adminEmail = env('ADMIN_EMAIL');
        $role = ($googleUserData['email'] === $adminEmail) ? 'admin' : 'customer';

        User::create([
            'google_id' => $googleUserData['id'],
            'email' => $googleUserData['email'],
            'nama' => $googleUserData['name'],
            'foto_profil' => $googleUserData['avatar'],
            'username' => $request->username, // <-- PASTIKAN BARIS INI ADA
            'password' => Hash::make($request->password), // <-- PASTIKAN BARIS INI ADA
            'role' => $role,
            'tanggal_daftar' => now(),
        ]);

        $request->session()->forget('google_user_data');

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login dengan username dan password Anda.');
    }
}