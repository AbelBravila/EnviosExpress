<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('login');
});

Route::get('/admin-dashboard', function () {
    return view('layout.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin-usuarios', function () {
    return view('layout.usuarios');
})->middleware(['auth', 'verified'])->name('usuarios');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('login'); // Redirige a la página de inicio
})->name('logout');

require __DIR__.'/auth.php';
