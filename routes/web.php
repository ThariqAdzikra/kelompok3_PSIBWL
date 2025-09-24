
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LaptopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "web".
|
*/

// --- PERBAIKAN DIMULAI DI SINI ---

// 1. Rute untuk menampilkan form login (GET)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// 2. Rute untuk memproses data login dari form (POST)
Route::post('/login', [LoginController::class, 'login']);

// 3. Rute utama (/) akan otomatis mengarahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// --- AKHIR DARI PERBAIKAN ---

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk proses otentikasi Google
Route::prefix('auth/google')->group(function () {
    Route::get('/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');
});

// Rute untuk registrasi pengguna baru setelah login Google
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Halaman dashboard yang akan diakses setelah login berhasil

Route::get('/dashboard', function () {
    return view('dashboard'); // Langsung panggil view
})->middleware('auth')->name('dashboard');

Route::resource('laptops', LaptopController::class);
