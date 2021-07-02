<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function classroomSubjects()
    {
        return $this->hasMany(ClassroomSubject::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
