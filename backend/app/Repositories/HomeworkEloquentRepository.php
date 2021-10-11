<?php

namespace App\Repositories;

use App\Models\Homework;

class HomeworkEloquentRepository implements HomeworkRepository
{
    public function createHomework($request)
    {
        return Homework::create([
            'homework' => $request->input('comment'),
            'name' => $request->input('name'),
            'classroom_id' => $request->input('classroom_id'),
            'subject_id' => $request->input('subject_id'),
            'date' => $request->input('date')
        ]);
    }
}
