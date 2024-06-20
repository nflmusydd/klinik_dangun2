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

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::controller(AdminController::class)->group(function () {
        Route::get('/add_doctor_view', 'addview');
        Route::post('/upload_doctor', 'upload');
        
        Route::get('/add_jenis_konsultasi', 'addjeniskonsultasi');
        Route::post('/upload_jenis_konsultasi', 'uploadjeniskonsultasi');
        
        Route::get('/add_konsultasi', 'addkonsultasi');
        Route::post('/upload_konsultasi', 'uploadkonsultasi');
        
        Route::get('/kelola_konsultasi', 'kelolakonsultasi');
        Route::post('/setujui_konsultasi', 'setujuikonsultasi')->name('setujui_konsultasi');
        Route::post('/tolak_konsultasi', 'tolakkonsultasi')->name('tolak_konsultasi');
        
        Route::get('/edit_konsultasi', 'editkonsultasi')->name('edit_konsultasi');
        Route::post('/editdata_konsultasi/{id}', 'editdatakonsultasi')->name('editdata_konsultasi');
        Route::post('/mengedit_konsultasi/{id}', 'mengeditkonsultasi')->name('mengedit_konsultasi');
        Route::delete('/hapus_konsultasi/{id}', 'hapuskonsultasi')->name('hapus_konsultasi');
    });
});

Route::get('/list_konsultasi', [HomeController::class, 'listkonsultasi']);
Route::post('/pilih_konsultasi', [HomeController::class, 'pilihkonsultasi'])->name('pilih_konsultasi');
Route::post('/pesan_konsultasi', [HomeController::class, 'pesankonsultasi'])->name('pesan_konsultasi');
Route::post('/memproses_konsultasi', [HomeController::class, 'memproseskonsultasi'])->name('memproses_konsultasi');

Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('riwayat');

require __DIR__.'/auth.php';
