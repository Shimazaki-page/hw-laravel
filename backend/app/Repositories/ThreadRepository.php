<?php

namespace App\Repositories;

interface ThreadRepository
{
    public function createThread($homework, $student);
}
