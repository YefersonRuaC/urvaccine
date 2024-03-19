<?php

use App\Http\Controllers\CampanaController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\InscritoController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacunaController;
use Illuminate\Support\Facades\Route;

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

//VACUNAS
Route::get('/vacunas/index', [VacunaController::class, 'index'])->middleware(['auth', 'verified'])->name('vacunas.index');
Route::get('/vacunas/create', [VacunaController::class, 'create'])->middleware(['auth', 'verified'])->name('vacunas.create');
Route::get('vacunas/{vacuna}/edit', [VacunaController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacunas.edit');
Route::get('vacunas/{vacuna}', [VacunaController::class, 'show'])->middleware(['auth', 'verified'])->name('vacunas.show');

//CAMPAÑAS
Route::get('/dashboard', [CampanaController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('campanas.index');
Route::get('/campanas/create', [CampanaController::class, 'create'])->middleware(['auth', 'verified'])->name('campanas.create');
Route::get('/campanas/{campana}/edit', [CampanaController::class, 'edit'])->middleware(['auth', 'verified'])->name('campanas.edit');
Route::get('/campanas/{campana}', [CampanaController::class, 'show'])->middleware(['auth', 'verified'])->name('campanas.show');;

//INSCRITOS
Route::get('/inscritos/{campana}', [InscritoController::class, 'index'])->middleware(['auth', 'verified', 'rol.admin'])->name('inscritos.index');
Route::get('/inscritos/{inscrito}/edit', [InscritoController::class, 'edit'])->middleware(['auth', 'verified', 'rol.admin'])->name('inscritos.edit');

//---------------------------------------------USUARIOS--------------------------------------------------------
//PERSONAS
Route::get('/personas', [PersonaController::class, 'index'])->middleware(['auth', 'verified', 'rol.persona'])->name('personas.index');
Route::get('/personas/{campana}', [PersonaController::class, 'show'])->middleware(['auth', 'verified', 'rol.persona'])->name('personas.show');

//HISTORIALES
Route::get('/historicos', [HistorialController::class, 'index'])->middleware(['auth', 'verified'])->name('historiales.index');

//MASCOTAS
Route::get('/mascotas', [MascotaController::class, 'index'])->middleware(['auth', 'verified', 'rol.mascota'])->name('mascotas.index');
Route::get('/mascotas/{campana}', [MascotaController::class, 'show'])->middleware(['auth', 'verified', 'rol.mascota'])->name('mascotas.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });

require __DIR__.'/auth.php';
