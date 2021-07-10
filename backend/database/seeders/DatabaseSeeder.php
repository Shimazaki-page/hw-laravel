<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClassroomSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(StudentSubjectTableSeeder::class);
    }
}
