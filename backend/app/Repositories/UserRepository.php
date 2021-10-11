<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepository
{
    public function createUser($request);

    public function getAUser($column, $request);
}
