<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Cargamos la vista de login cuando el usuario entra en la raiz de la APP

Route::get('/', [HomeController::class, 'index'])->name('app.dashboard');
Route::get('profile', [ProfileController::class, 'index']);

//Route::get('incidences', [IncidenceController::class, 'index'])->name('app.incidences.index');
Route::resource('incidences', IncidenceController::class)->names('app.incidences');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
