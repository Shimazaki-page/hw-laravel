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

Route::get('/students/{class_id}/{subject_id}', [Controllers\StudentsController::class, 'showStatus'])->name('students.status');
//Route::get('/students/{id}/{ids}',function (){
//    return view('welcome');
//})->name('students.status');
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [Controllers\StudentsController::class, 'showClasses'])->name('top');
Route::get('/students', [Controllers\StudentsController::class, 'showStudents'])->name('students.students-list');
