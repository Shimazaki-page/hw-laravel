<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:backend/app/Models/Subject.php
class Subject extends Model
=======
class Homework extends Model
>>>>>>> release:backend/app/Models/Homework.php
{
    use HasFactory;

    public function subject()
    {
<<<<<<< HEAD:backend/app/Models/Subject.php
        return $this->hasMany(HomeworkThread::class);
=======
        return $this->belongsTo(Subject::class);
>>>>>>> release:backend/app/Models/Homework.php
    }
}
