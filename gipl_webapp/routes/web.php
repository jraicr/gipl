<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PeripheralController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScholarGroupController;
use App\Models\Classroom;
use App\Models\ScholarGroup;

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

Route::resource('incidences', IncidenceController::class)->names('app.incidences');
Route::resource('peripherals', PeripheralController::class)->names('app.peripherals');
Route::resource('students', StudentController::class)->names('app.students');
Route::resource('classrooms', ClassroomController::class)->except('show')->names('app.classrooms');
Route::resource('computers', ComputerController::class)->names('app.computers');
Route::resource('scholar_groups', ScholarGroupController::class)->names('app.scholar_groups');
Route::get('edit_scholar_group/{scholar_group}/remove_student/{student})', [StudentController::class, 'removeScholarGroup'])->middleware('can:app.students.edit')->name('app.student_remove_scholar_group.update');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('app.users');
Route::resource('roles', RoleController::class)->except('show')->names('app.roles');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
