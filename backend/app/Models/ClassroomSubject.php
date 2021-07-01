<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSubject extends Model
{
    use HasFactory;

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
}
