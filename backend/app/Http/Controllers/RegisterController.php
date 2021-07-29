<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Student;
use App\Models\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerHomework(Request $request)
    {
        $homework = Homework::create([
            'homework' => $request->input('comment'),
            'name' => $request->input('name'),
            'classroom_id' => $request->input('classroom_id'),
            'subject_id' => $request->input('subject_id'),
            'date'=>Carbon::now()
        ]);

        $students = Student::where([
            'classroom_id' => $request->input('classroom_id')
        ])->get();

        foreach ($students as $student){
            Thread::create([
                'homework_id' => $homework->id,
                'student_id' => $student->id,
                'status' => '-'
            ]);
        }

        return redirect(route('homework', [$request->input('classroom_id'), $request->input('subject_id')]));
    }
}
