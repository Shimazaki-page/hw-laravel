<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Comment;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function showHomeworkSubmit($classroom_id, $subject_id)
    {
        $homeworks = Homework::where([
            'classroom_id' => $classroom_id,
            'subject_id' => $subject_id
        ])->get();

        return view('threads.homework_submit')->with([
            'homeworks' => $homeworks,
            'classroom_id' => $classroom_id,
            'subject_id' => $subject_id
        ]);
    }

    public function verifyHomework(Request $request)
    {
        $name = $request->input('name');
        $comment = $request->input('comment');
        $classroom_id = $request->input('classroom_id');
        $subject_id = $request->input('subject_id');

        return view('threads.verify_homework')->with([
            'name' => $name,
            'comment' => $comment,
            'classroom_id' => $classroom_id,
            'subject_id' => $subject_id
        ]);
    }

    public function showSubmitThread(Thread $thread)
    {
        $comments = Comment::where('thread_id', $thread->id)->get();
        $homework = Homework::where('id', $thread->homework_id)->first();
        return view('threads.submit_thread')->with([
            'comments' => $comments,
            'thread' => $thread,
            'homework' => $homework
        ]);
    }
}
