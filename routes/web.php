<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');

    Route::get('/ingresos', [App\Http\Controllers\IngresoController::class, 'index'])->name('ingresos.index');
    Route::get('/ingresos/create', [App\Http\Controllers\IngresoController::class, 'create'])->name('ingresos.create');
    Route::get('/ingresos/{ingreso}/edit', [App\Http\Controllers\IngresoController::class, 'edit'])->name('ingresos.edit');
    Route::post('/ingresos', [App\Http\Controllers\IngresoController::class, 'store'])->name('ingresos.store');
    Route::put('/ingresos/{ingreso}', [App\Http\Controllers\IngresoController::class, 'update'])->name('ingresos.update');
    Route::delete('/ingresos/{ingreso}', [App\Http\Controllers\IngresoController::class, 'delete'])->name('ingresos.delete');

    Route::get('/gastos', [App\Http\Controllers\GastoController::class, 'index'])->name('gastos.index');
    Route::get('/gastos/create', [App\Http\Controllers\GastoController::class, 'create'])->name('gastos.create');
    Route::get('/gastos/{gasto}/edit', [App\Http\Controllers\GastoController::class, 'edit'])->name('gastos.edit');
    Route::post('/gastos', [App\Http\Controllers\GastoController::class, 'store'])->name('gastos.store');
    Route::put('/gastos/{gasto}', [App\Http\Controllers\GastoController::class, 'update'])->name('gastos.update');
    Route::delete('/gastos/{gasto}', [App\Http\Controllers\GastoController::class, 'delete'])->name('gastos.delete');

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
});