<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AyudaController;
use App\Http\Livewire\Formtable;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('ayuda', [AyudaController::class, 'create'])->name('ayuda.create');
Route::post('ayuda', [AyudaController::class, 'store'])->name('ayuda.store');

Route::get('/table',Formtable::class);


require __DIR__.'/auth.php';
