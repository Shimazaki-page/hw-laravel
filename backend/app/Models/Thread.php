<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    protected $fillable=['homework_id','student_id','status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
