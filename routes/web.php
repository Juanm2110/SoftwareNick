<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DeudaController;

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
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::delete('/pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
Route::resource('pacientes', PacienteController::class);
Route::get('/pacientes/{id}/historia-clinica', [PacienteController::class, 'descargarHistoriaClinica'])->name('pacientes.historia_clinica');


Route::prefix('citas')->group(function () {
    Route::get('/', [CitaController::class, 'index'])->name('citas.index'); // Listar citas
    Route::get('/crear', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/guardar', [CitaController::class, 'store'])->name('citas.store'); 
    Route::get('/{id}/editar', [CitaController::class, 'edit'])->name('citas.edit'); 
    Route::put('/{id}', [CitaController::class, 'update'])->name('citas.update'); 
    Route::delete('/{cita}', [CitaController::class, 'destroy'])->name('citas.destroy');
 

    Route::post('/notificaciones/clear', function () {
        session()->forget('notificaciones');
        return response()->json(['success' => true]);
    })->name('notificaciones.clear');
    

    
});
Route::prefix('productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('productos.index'); // Listar productos
    Route::get('/crear', [ProductoController::class, 'create'])->name('productos.create'); // Formulario para crear producto
    Route::post('/guardar', [ProductoController::class, 'store'])->name('productos.store'); // Guardar nuevo producto
    Route::get('/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit'); // Formulario para editar producto
    Route::put('/{producto}', [ProductoController::class, 'update'])->name('productos.update'); // Actualizar producto
    Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy'); // Eliminar producto
});

Route::resource('deudas', DeudaController::class);


require __DIR__.'/auth.php';
