<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkThread extends Model
{
    use HasFactory;

    public function subject_areas()
    {
        return $this->belongsTo(SubjectArea::class);
    }
}
