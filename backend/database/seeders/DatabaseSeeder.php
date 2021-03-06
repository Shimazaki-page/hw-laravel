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
        $this->call(ClassroomTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(StudentSubjectTableSeeder::class);
        $this->call(HomeworkTableSeeder::class);
        $this->call(ThreadTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
