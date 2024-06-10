<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});

// Route::get('admin/dashboard',[HomeController::class, 'index'])->middleware(['auth','admin']);

// Tanpa menggunakan middleware, hanya menggunakan if else
Route::get('/home', [HomeController::class, 'redirect'])->name('home');

Route::get('/add_doctor_view', [AdminController::class, 'addview'])->middleware(['auth','admin']);
Route::post('/upload_doctor', [AdminController::class, 'upload'])->middleware(['auth','admin']);

Route::get('/add_jenis_konsultasi', [AdminController::class, 'addjeniskonsultasi'])->middleware(['auth','admin']);
Route::post('/upload_jenis_konsultasi', [AdminController::class, 'uploadjeniskonsultasi'])->middleware(['auth','admin']);

Route::get('/add_konsultasi', [AdminController::class, 'addkonsultasi'])->middleware(['auth','admin']);
Route::post('/upload_konsultasi', [AdminController::class, 'uploadkonsultasi'])->middleware(['auth','admin']);

Route::get('/kelola_konsultasi', [AdminController::class, 'kelolakonsultasi'])->middleware(['auth','admin']);
Route::post('/setujui_konsultasi', [AdminController::class, 'setujuikonsultasi'])->middleware(['auth','admin'])->name('setujui_konsultasi');
Route::post('/tolak_konsultasi', [AdminController::class, 'tolakkonsultasi'])->middleware(['auth','admin'])->name('tolak_konsultasi');

Route::get('/edit_konsultasi', [AdminController::class, 'editkonsultasi'])->middleware(['auth','admin']);
Route::post('/editdata_konsultasi', [AdminController::class, 'editdatakonsultasi'])->middleware(['auth','admin'])->name('editdata_konsultasi');
Route::delete('/hapus_konsultasi/{id}', [AdminController::class, 'hapuskonsultasi'])->middleware(['auth','admin'])->name('hapus_konsultasi');

Route::get('/list_konsultasi', [HomeController::class, 'listkonsultasi']);
Route::post('/pilih_konsultasi', [HomeController::class, 'pilihkonsultasi'])->name('pilih_konsultasi');
Route::post('/pesan_konsultasi', [HomeController::class, 'pesankonsultasi'])->name('pesan_konsultasi');
Route::post('/memproses_konsultasi', [HomeController::class, 'memproseskonsultasi'])->name('memproses_konsultasi');

Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('riwayat');

require __DIR__.'/auth.php';
