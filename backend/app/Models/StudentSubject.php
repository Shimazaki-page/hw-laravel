<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;

    protected $table = 'student_subject';
    protected $fillable = ['subject_id', 'student_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
