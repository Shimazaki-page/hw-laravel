<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

<<<<<<< HEAD
    public function classroomSubject()
=======
    public function classroomSubjects()
>>>>>>> release
    {
        return $this->hasMany(ClassroomSubject::class);
    }
}
