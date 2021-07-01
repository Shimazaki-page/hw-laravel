<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSubject extends Model
{
    use HasFactory;

<<<<<<< HEAD
    public function homeworkThreads()
    {
        return $this->hasMany(HomeworkThread::class);
=======
<<<<<<<< HEAD:backend/app/Models/HomeworkThread.php
    public function subject()
    {
        return $this->belongsTo(Subject::class);
========
    public function homeworks()
    {
        return $this->hasMany(Homework::class);
>>>>>>>> release:backend/app/Models/ClassroomSubject.php
>>>>>>> release
    }
}
