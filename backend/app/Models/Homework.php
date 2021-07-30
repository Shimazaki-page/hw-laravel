<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    protected $table='homeworks';
    protected $fillable = ['classroom_id','subject_id','name','homework','date'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

