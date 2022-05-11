<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\TimeTableController;

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
    return view('home');
})->name('home');

Route::resource('subjects', SubjectController::class)->except('edit', 'update', 'delete');
Route::resource('faculties', FacultyController::class)->except('edit', 'update', 'delete');

// Time Table
Route::get('time_tables/create', [TimeTableController::class, 'create'])->name('time_tables.create');
Route::get('time_tables', [TimeTableController::class, 'index'])->name('time_tables.index');
Route::post('time_tables', [TimeTableController::class, 'store'])->name('time_tables.store');
Route::post('time_tables/{id}/delete', [TimeTableController::class, 'delete'])->name('time_tables.delete');