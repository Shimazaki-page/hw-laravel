<?php

namespace App\Repositories;

interface StudentRepository
{
    public function getStudentsInAClass($request, $id);
}
