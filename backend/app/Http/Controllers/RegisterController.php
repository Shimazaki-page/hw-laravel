<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Homework;
use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\Thread;
use App\Models\User;
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
            'date' => Carbon::now()
        ]);

        $students = Student::where([
            'classroom_id' => $request->input('classroom_id')
        ])->get();

        foreach ($students as $student) {
            Thread::create([
                'homework_id' => $homework->id,
                'student_id' => $student->id,
                'status' => '-'
            ]);
        }

        return redirect(route('homework', [$request->input('classroom_id'), $request->input('subject_id')]));
    }

    public function registerComment(Thread $thread, Request $request)
    {
        Comment::create([
            'name' => $request->input('name'),
            'comment' => $request->input('comment'),
            'image' => $request->input('image'),
            'thread_id' => $thread->id
        ]);

        if ($thread->status === "-") {
            $thread->status = "△";
            $thread->save();
        }

        return redirect(route('submit-thread', [$thread]));
    }

    public function addStudent(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role' => 10
        ]);

        $new_user = User::where('email', $request->input('email'))->first();

        Student::create([
            'classroom_id' => $request->classroom,
            'user_id' => $new_user->id
        ]);

        $new_student = Student::where('user_id', $new_user->id)->first();
        $subjects = $request->input('subject');

        foreach ($subjects as $subject) {
            StudentSubject::create([
                'subject_id' => $subject,
                'student_id' => $new_student->id
            ]);
        }

        foreach ($subjects as $subject) {
            $homeworks = Homework::where([
                'classroom_id' => $request->classroom,
                'subject_id' => $subject
            ])->get();

            foreach ($homeworks as $homework) {
                Thread::create([
                    'homework_id' => $homework->id,
                    'student_id' => $new_student->id,
                    'status' => "-"
                ]);
            }
        }

        return redirect('add-student');
    }

    public function acceptHomework(Thread $thread)
    {
        $thread->status = "○";
        $thread->save();

        return redirect(route('submit-thread', [$thread->id]));
    }
}
