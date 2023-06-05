<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RolController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::view('/productos','index')->name('admin.roles.index');
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [RolController::class, 'create'])->name('productos.create');
    Route::post('/productos', [RolController::class, 'store'])->name('productos.store');
    Route::get('/productos/{id}', [RolController::class, 'show'])->name('productos.show');
    Route::get('/productos/{id}/edit', [RolController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{id}', [RolController::class, 'update'])->name('productos.update');
    Route::patch('/productos/{id}', [RolController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{id}', [RolController::class, 'destroy'])->name('productos.destroy');
});

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::view('/admin','index')->name('admin.users.index');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/pdf', [UserController::class, 'pdf'])->name('admin.users.pdf');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/users/{id}', [UserController::class, 'update']);
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::view('/roles','index')->name('admin.roles.index');
    Route::get('/roles', [RolController::class, 'index'])->name('admin.roles.index');
    Route::get('/roles/create', [RolController::class, 'create'])->name('admin.roles.create');
    Route::post('/roles', [RolController::class, 'store'])->name('admin.roles.store');
    Route::get('/roles/{id}', [RolController::class, 'show'])->name('admin.roles.show');
    Route::get('/roles/{id}/edit', [RolController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/roles/{id}', [RolController::class, 'update'])->name('admin.roles.update');
    Route::patch('/roles/{id}', [RolController::class, 'update'])->name('admin.roles.update');
    Route::delete('/roles/{id}', [RolController::class, 'destroy'])->name('admin.roles.destroy');
});


require __DIR__.'/auth.php';
