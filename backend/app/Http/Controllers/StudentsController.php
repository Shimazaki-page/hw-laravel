<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Homework;
use App\Models\Student;
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

    public function showStatus(Classroom $classroom, Subject $subject)
    {
        $homeworks = Homework::where([
            'classroom_id' => $classroom->id,
            'subject_id' => $subject->id
        ])->get();

        $students = Student::where('classroom_id',$classroom->id)->with('user')->get();

        return view('students.status')->with([
            'classroom' => $classroom,
            'subject' => $subject,
            'homeworks' => $homeworks,
            'students' => $students
        ]);
    }

    public function showStudents()
    {
        $students = Student::with(['classroom', 'user' => function ($query) {
            $query->where('role', '=', '10');
        }])->orderBy('classroom_id')->simplePaginate(10);

        return view('students.students_list')->with('students', $students);
    }

    public function showAddStudentForm()
    {
        $classrooms=Classroom::all();
        $subjects=Subject::all();

        return view('add-student')->with([
            'classrooms'=>$classrooms,
            'subjects'=>$subjects
        ]);
    }
}
