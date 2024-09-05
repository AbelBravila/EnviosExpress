<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SucursalesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('login');
});

// Route::get('/admin-dashboard', function () {
//     return view('layout.admin');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('empleados', [EmpleadosController::class, 'index'])->name('empleados');
Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios');
Route::get('sucursales', [SucursalesController::class, 'index'])->name('sucursales');



//Lo usé para ingresar un usuario
// Route::get('/RegistarUsuario', function () {
//     return view('auth.register');
// });


// Route::get('/admin-usuarios', function () {
//     return view('layout.usuarios');
// })->middleware(['auth', 'verified'])->name('usuarios');

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
