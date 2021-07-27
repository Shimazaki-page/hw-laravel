<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [Controllers\StudentsController::class, 'showClasses'])->name('top');
Route::get('/students', [Controllers\StudentsController::class, 'showStudents'])->name('students.students-list');
Route::get('/students/{classroom}/{subject}', [Controllers\StudentsController::class, 'showStatus'])->name('students.status');
