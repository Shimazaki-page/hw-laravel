<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $teacher = [
            'name' => 'teacher',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'classroom_id' => 7,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        DB::table('users')->insert($teacher);
        User::factory()->count(50)->create();
    }
}
