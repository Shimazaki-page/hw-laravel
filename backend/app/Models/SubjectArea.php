<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectArea extends Model
{
    use HasFactory;

    public function homeworkThreads()
    {
         return $this->hasMany(HomeworkThread::class);
    }
}
