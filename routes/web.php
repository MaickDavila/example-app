<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EventoController;

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

Route::get('/tareas', [TareaController::class, 'getAll'])->name('tareas.getAll');
Route::post('/tareas', [TareaController::class, 'post'])->name('tareas.post');
Route::get('/tareas/{id}', [TareaController::class, 'getById'])->name('tareas.getById');
Route::put('/tareas/{id}', [TareaController::class, 'update'])->name('tareas.update');
Route::delete('/tareas/{id}', [TareaController::class, 'delete'])->name('tareas.delete');


Route::get('/eventos', [EventoController::class, 'getAll'])->name('eventos.getAll');
Route::post('/eventos', [EventoController::class, 'post'])->withoutMiddleware(['auth', 'verified'])->name('eventos.post');
Route::get('/eventos/{id}', [EventoController::class, 'getById'])->name('eventos.getById');
Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
Route::delete('/eventos/{id}', [EventoController::class, 'delete'])->name('eventos.delete');



require __DIR__.'/auth.php';
