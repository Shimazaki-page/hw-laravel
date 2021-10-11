<?php

namespace App\Repositories;

use App\Models\Student;

class StudentEloquentRepository implements StudentRepository
{
    public function getStudentsInAClass($request, $id)
    {
        return Student::where([
            'classroom_id' => $request->input('classroom_id'),
            'id' => $id->student_id
        ]);
    }
}
