<?php

namespace App\Repositories;

interface UserRepository
{
    public function createUser($request);

    public function getAUser($column, $request);

    public function isDuplicateEmail($column, $email): bool;
}
