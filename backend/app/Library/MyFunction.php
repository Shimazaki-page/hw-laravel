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
        ])->get();

        return $thread;
    }

    public static function scopeHomework($homework_id, $student_id)
    {
        $thread = Thread::where([
            'homework_id' => $homework_id,
            'student_id' => $student_id
        ])->first();

        return $thread;
    }

    public static function transStatus($status)
    {

        if ($status == 1) {
            return "-";
        } elseif ($status == 2) {
            return "△";
        } elseif ($status == 3) {
            return "○";
        }else{
            return "ERR!";
        }
    }
}
