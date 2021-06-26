<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectArea extends Model
{
    use HasFactory;

    public function homework_threads()
    {
         return $this->hasMany(HomeworkThread::class);
    }
}
