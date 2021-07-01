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
        $this->call(ClassroomsTableSeeder::Class);
        $this->call(UsersTableSeeder::Class);
        $this->call(SubjectsTableSeeder::Class);
        $this->call(UserSubjectTableSeeder::Class);
        $this->call(ClassroomSubjectTableSeeder::Class);
        $this->call(HomeworksTableSeeder::Class);
        $this->call(CommentsTableSeeder::Class);
    }
}
