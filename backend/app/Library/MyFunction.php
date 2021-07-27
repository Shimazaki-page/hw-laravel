<?php

namespace App\Library;

use App\Models\Thread;

class MyFunction
{
    public static function scopeStatus($student_id, $homework_id)
    {
        $thread = Thread::where([
            'student_id' => $student_id,
            'homework_id' => $homework_id
        ])->get(['status']);
        return $thread;
    }
}
