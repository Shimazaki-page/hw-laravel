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
Route::get('/homework/{classroom_id}/{subject_id}',[Controllers\ThreadsController::class,'showHomeworkSubmit'])->name('homework');
Route::get('/homework/verify',[Controllers\ThreadsController::class,'verifyHomework'])->name('homework.verify');
Route::post('/homework/verify',[Controllers\RegisterController::class,'registerHomework'])->name('register.homework');
Route::get('/submit/{thread}',[Controllers\ThreadsController::class,'showSubmitThread'])->name('submit-thread');
Route::post('/submit/{thread}',[Controllers\RegisterController::class,'registerComment'])->name('register-comment');
Route::get('/add-student',[Controllers\StudentsController::class,'showAddStudentForm'])->name('add-student-form');
Route::post('/add-student',[Controllers\RegisterController::class,'addStudent'])->name('add-student');
