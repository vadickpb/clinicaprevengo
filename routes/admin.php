<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PacienteController;
use App\Http\Controllers\Admin\RoleController;


// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.delete');

// Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index');


Route::get('/', [HomeController::class, 'index'])->name('admin.index');

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Route::resource('pacientes', PacienteController::class);
