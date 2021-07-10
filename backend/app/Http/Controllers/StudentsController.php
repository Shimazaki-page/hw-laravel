<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class StudentsController extends Controller
{
    public function showClasses()
    {
        $classes = Classroom::where('id', '<', 7)->get();
        $subjects = Subject::all();

        return view('top')->with([
            'classes' => $classes,
            'subjects' => $subjects
        ]);
    }

    public function showThreads()
    {
        return view('students.classroom_students');
    }

    public function showStudents()
    {
        $students=User::with('classroom')->where('classroom_id','<=',6)
            ->orderBy('classroom_id')->simplePaginate(20);

        return view('students.students_list')->with('students',$students);
    }
}
