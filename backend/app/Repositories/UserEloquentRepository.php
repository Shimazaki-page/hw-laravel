<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserEloquentRepository implements UserRepository
{
    public function createUser($request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 10
        ]);
    }

    public function getAUser($column, $request)
    {
        return User::where($column, $request)->first();
    }
}
