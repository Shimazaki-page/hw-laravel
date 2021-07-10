<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => '管理者',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 1,
            'remember_token' => Str::random(10)
        ];
        User::create($admin);

        $teacher = [
            'name' => '先生',
            'email' => 'teacher@teacher.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 5,
            'remember_token' => Str::random(10)
        ];
        User::create($teacher);

        User::factory()->count(18)->create();
    }
}
