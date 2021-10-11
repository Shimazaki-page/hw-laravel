<?php

namespace App\Repositories;

use App\Models\StudentSubject;

class StudentSubjectEloquentRepository implements StudentSubjectRepository
{
    public function getStudentIdArray($request)
    {
        return StudentSubject::where('subject_id', $request->input('subject_id'))->get('student_id');
    }
}
