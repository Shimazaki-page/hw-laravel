<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Homework;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function showClasses()
    {
        $classes = Classroom::where('id', '<', 7)->get();
        $subjects = Subject::all();

        return view('top')->with([
            'classes' => $classes,
            'subjects' => $subjects
        ]);
    }

    /**
     * @param Classroom $classroom
     * @param Subject $subject
     * @return Application|Factory|View
     */
    public function showStatus(Classroom $classroom, Subject $subject)
    {
        $homeworks = Homework::where([
            'classroom_id' => $classroom->id,
            'subject_id' => $subject->id
        ])->get();

//        $scope_students_id=StudentSubject::where('subject_id',$subject->id)->get();
        $students = Student::where('classroom_id', $classroom->id)->with('user')->get();

        return view('students.status')->with([
            'classroom' => $classroom,
            'subject' => $subject,
            'homeworks' => $homeworks,
            'students' => $students
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function showStudents()
    {
        $students = Student::with(['classroom', 'user' => function ($query) {
            $query->where('role', '=', '10');
        }])->orderBy('classroom_id')->simplePaginate(10);

        return view('students.students_list')->with('students', $students);
    }

    /**
     * @return Application|Factory|View
     */
    public function showAddStudentForm()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        return view('add-student')->with([
            'classrooms' => $classrooms,
            'subjects' => $subjects
        ]);
    }

    /**
     * @param Student $student
     * @param Subject $subject
     * @return Application|Factory|View
     */
    public function showHomework(Student $student, Subject $subject)
    {
        if ($this->isOwnPage($student) == false) {
            abort(403, '権限がありません。');
        }

        $homeworks = Homework::where([
            'classroom_id' => $student->classroom_id,
            'subject_id' => $subject->id
        ])->simplePaginate(5);

        return view('student-homework-list')->with([
            'homeworks' => $homeworks,
            'student' => $student,
            'subject' => $subject
        ]);
    }

    /**
     * @param Student $student
     * @return Application|Factory|View
     */
    public function showMypage(Student $student)
    {
        if ($this->isOwnPage($student) == false) {
            abort(403, '権限がありません。');
        }

        $subjects = Subject::with(['studentSubject' => function ($query) use ($student) {
            $query->where('student_id', $student->id);
        }])->get();

        return view('mypage')->with([
            'student' => $student,
            'subjects' => $subjects
        ]);
    }

    /**
     * @param $student
     * @return bool
     */
    public function isOwnPage($student): bool
    {
        if (Auth::user()->id == $student->user_id || Auth::user()->role == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param Student $student
     * @return Application|Factory|View
     */
    public function showDeleteStudent(Student $student)
    {
        return view('students.delete_student')->with('student', $student);
    }
}
