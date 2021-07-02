<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class StudentsController extends Controller
{
    public function showClasses()
    {
        $classes = Classroom::where('id', '<', 7)->get();
        $subjects = Subject::all();

        return view('top')->with('classes', $classes)->with('subjects', $subjects);
    }

    public function showThreads()
    {
        return view('students.classroom_students');
    }
}
