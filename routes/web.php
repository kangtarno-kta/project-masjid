<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Models\Berita;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/berita/{slug}', function ($slug) {
    $berita = Berita::where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    return view('berita.show', compact('berita'));
})->name('berita.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('berita', BeritaController::class)
            ->parameters([
                'berita' => 'berita',
            ])
            ->except(['show']);

        Route::get('/pengguna', [UserController::class, 'index'])
            ->name('pengguna.index');

        Route::patch('/pengguna/{user}/role', [UserController::class, 'updateRole'])
            ->name('pengguna.updateRole');
    });

require __DIR__ . '/auth.php';
