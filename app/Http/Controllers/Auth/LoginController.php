<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // Method untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan Anda memiliki view ini atau sesuaikan
    }

    // Method untuk proses login standar
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'login' => 'Username atau Password salah.',
        ]);
    }

    // Redirect ke Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback dari Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // --- LOGIKA ADMIN DIMULAI DI SINI ---
            // Ambil email admin dari file .env
            $adminEmail = env('ADMIN_EMAIL');

            // Tentukan role berdasarkan email
            $userRole = ($googleUser->getEmail() == $adminEmail) ? 'admin' : 'customer';
            // --- LOGIKA ADMIN SELESAI ---

            $user = User::updateOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'nama' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'username' => explode('@', $googleUser->getEmail())[0], // Username awal dari email
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                    'password' => bcrypt(str()->random(16)), // Password acak untuk keamanan
                    'role' => $userRole, // Tetapkan role di sini
                ]
            );

            Auth::login($user);

            return redirect('/dashboard');

        } catch (\Exception $e) {
            // Sebaiknya log error di sini
            return redirect('/login')->withErrors('Terjadi kesalahan saat otentikasi dengan Google.');
        }
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}