<?php

namespace App\Repositories;

use App\Models\Thread;

class ThreadEloquentRepository implements ThreadRepository
{
    public function createThread($homework, $student)
    {
        Thread::create([
            'homework_id' => $homework->id,
            'student_id' => $student->id,
            'status' => 1
        ]);
    }
}
