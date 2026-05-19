<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ResponsibleController;
use App\Http\Controllers\ProcesoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/clientes', [ClientController::class, 'index'])->middleware(['auth', 'verified'])->name('clientes.index');
Route::get('/clientes/cargar', [ClientController::class, 'upload'])->middleware(['auth', 'verified'])->name('clientes.upload');
Route::get('/clientes/crear', [ClientController::class, 'create'])->middleware(['auth', 'verified'])->name('clientes.create');
Route::post('/clientes', [ClientController::class, 'store'])->middleware(['auth', 'verified'])->name('clientes.store');
Route::get('/clientes/plantilla', [ClientController::class, 'downloadTemplate'])->middleware(['auth', 'verified'])->name('clientes.template');
Route::post('/clientes/importar', [ClientController::class, 'import'])->middleware(['auth', 'verified'])->name('clientes.import');
Route::get('/clientes/{id}', [ClientController::class, 'show'])->middleware(['auth', 'verified'])->name('clientes.show');

Route::get('/api/departamentos/{department}/municipios', function (App\Models\Department $department) {
    return response()->json($department->municipalities()->orderBy('name')->get(['id', 'name']));
})->middleware(['auth', 'verified'])->name('api.municipalities');

// Rutas de Responsables
Route::get('/responsables', [ResponsibleController::class, 'index'])->middleware(['auth', 'verified'])->name('responsibles.index');
Route::get('/responsables/crear', [ResponsibleController::class, 'create'])->middleware(['auth', 'verified'])->name('responsibles.create');
Route::post('/responsables', [ResponsibleController::class, 'store'])->middleware(['auth', 'verified'])->name('responsibles.store');

// Rutas de Procesos
Route::get('/procesos/registro', [ProcesoController::class, 'create'])->middleware(['auth', 'verified'])->name('procesos.create');
Route::post('/procesos', [ProcesoController::class, 'store'])->middleware(['auth', 'verified'])->name('procesos.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
