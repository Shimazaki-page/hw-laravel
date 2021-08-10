<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddHomeworkRequest;
use App\Models\Homework;
use App\Models\Comment;
use App\Models\Student;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;

class ThreadsController extends Controller
{
    public function showHomeworkSubmit($classroom_id, $subject_id)
    {
        $homeworks = Homework::where([
            'classroom_id' => $classroom_id,
            'subject_id' => $subject_id
        ])->simplePaginate(3);

        return view('threads.homework_submit')->with([
            'homeworks' => $homeworks,
            'classroom_id' => $classroom_id,
            'subject_id' => $subject_id
        ]);
    }

    public function verifyHomework(AddHomeworkRequest $request)
    {
        $name = $request->input('name');
        $comment = $request->input('comment');
        $date=$request->input('date');
        $classroom_id = $request->input('classroom_id');
        $subject_id = $request->input('subject_id');

        return view('threads.verify_homework')->with([
            'name' => $name,
            'comment' => $comment,
            'date'=>$date,
            'classroom_id' => $classroom_id,
            'subject_id' => $subject_id
        ]);
    }

    public function showSubmitThread(Thread $thread, Student $student)
    {
        if ($this->isOwnThread($student) == false) {
            abort(403, '権限がありません。');
        }

        $comments = Comment::where('thread_id', $thread->id)->simplePaginate(3);
        $homework = Homework::where('id', $thread->homework_id)->first();
        $student->load('user', 'classroom');

        return view('threads.submit_thread')->with([
            'comments' => $comments,
            'thread' => $thread,
            'homework' => $homework,
            'student' => $student
        ]);
    }

    public function isOwnThread($student): bool
    {
        if (Auth::user()->role == 10 && Auth::user()->id !== $student->user_id) {
            return false;
        } else {
            return true;
        }
    }

    public function showDeleteHomework(Homework $homework)
    {
        return view('threads.delete_homework')->with('homework', $homework);
    }

    public function showEditHomework(Homework $homework)
    {
        return view('threads.edit-homework')->with('homework', $homework);
    }

    public function verifyDeleteComment(Comment $comment_id, Student $student_id)
    {
        return view('threads.verify_delete_comment')->with([
            'comment' => $comment_id,
            'student' => $student_id
        ]);
    }
}
