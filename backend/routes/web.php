<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware(['can:teacher', 'auth'])->group(function () {
    Route::get('/', [Controllers\StudentsController::class, 'showClasses'])->name('top');
    Route::get('/students', [Controllers\StudentsController::class, 'showStudents'])->name('students.students-list');
    Route::get('/students/{classroom}/{subject}/{month}', [Controllers\StudentsController::class, 'showStatus'])->name('students.status');
    Route::get('/homework/{classroom_id}/{subject_id}', [Controllers\ThreadsController::class, 'showHomeworkSubmit'])->name('homework');
    Route::get('/homework/verify', [Controllers\ThreadsController::class, 'verifyHomework'])->name('homework.verify');
    Route::post('/homework/verify', [Controllers\RegisterController::class, 'registerHomework'])->name('register.homework');
    Route::get('/add-student', [Controllers\StudentsController::class, 'showAddStudentForm'])->name('add-student-form');
    Route::post('/add-student', [Controllers\RegisterController::class, 'addStudent'])->name('add-student');
    Route::get('/accept/{thread}/{student}', [Controllers\RegisterController::class, 'acceptHomework'])->name('accept');
    Route::get('/delete-student/{student}', [Controllers\StudentsController::class, 'showDeleteStudent'])->name('verify-delete-student');
    Route::post('/delete-student', [Controllers\DeleteController::class, 'deleteStudent'])->name('delete-student');
    Route::get('/delete-homework/{homework}', [Controllers\ThreadsController::class, 'showDeleteHomework'])->name('verify-delete-homework');
    Route::post('/delete-homework', [Controllers\DeleteController::class, 'deleteHomework'])->name('delete-homework');
    Route::get('/edit-homework/{homework}', [Controllers\ThreadsController::class, 'showEditHomework'])->name('edit-homework');
    Route::post('/edit-homework', [Controllers\RegisterController::class, 'updateHomework'])->name('register-edit-homework');
    Route::get('/delete-comment/{comment_id}/{student_id}', [Controllers\ThreadsController::class, 'verifyDeleteComment'])->name('verify-delete-comment');
    Route::post('/delete-comment', [Controllers\DeleteController::class, 'deleteComment'])->name('delete-comment');
});

Route::middleware(['can:student', 'auth'])->group(function () {
    Route::get('/mypage/{student}', [Controllers\StudentsController::class, 'showMypage'])->name('mypage');
    Route::get('/student-homework-list/{student}/{subject}', [Controllers\StudentsController::class, 'showHomework'])->name('student-homework-list');
});

Route::middleware('auth')->group(function () {
    Route::get('/submit/{thread}/{student}', [Controllers\ThreadsController::class, 'showSubmitThread'])->name('submit-thread');
    Route::post('/submit/{thread}/{student}', [Controllers\RegisterController::class, 'registerComment'])->name('register-comment');
});
