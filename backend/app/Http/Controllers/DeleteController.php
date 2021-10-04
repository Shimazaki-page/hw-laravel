<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Homework;
use App\Models\Student;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteStudent(Request $request)
    {
        Student::destroy($request->id);

        return redirect(route('students.students-list'));
    }

    public function deleteHomework(Request $request)
    {
        $homework = Homework::find($request->id);
        $classroom_id = $homework->classroom_id;
        $subject_id = $homework->subject_id;
        Homework::destroy($request->id);

        return redirect(route('homework', [$classroom_id, $subject_id]));
    }

    public function deleteComment(Request $request)
    {
        Comment::destroy($request->comment);

        return redirect(route('submit-thread', [$request->thread, $request->student]));
    }
}
