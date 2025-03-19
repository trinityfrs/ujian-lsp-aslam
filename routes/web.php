<?php

use App\Http\Controllers\admin\DashboardAdmin;
use App\Http\Controllers\admin\PesertaController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\DashboardUser;
use App\Models\Peserta;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [DashboardUser::class, 'index'])->name('home.user');

// routes admin
Route::get('/admin/dashboard', [DashboardAdmin::class, 'index'])->name('admin.dashboard');
Route::get('/tambah-peserta', [PesertaController::class, 'index'])->name('tambah.peserta');
Route::post('/create/peserta', [PesertaController::class, 'store'])->name('create.peserta');

Route::get('/setting-sertifikat', [SettingController::class, 'index'])->name('tambah.setting');
Route::post('/create/setting', [SettingController::class, 'save'])->name('create.setting');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
