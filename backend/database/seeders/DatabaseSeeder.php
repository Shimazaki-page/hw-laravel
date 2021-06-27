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
        $this->call(SubjectAreasTableSeeder::Class);
        $this->call(HomeworkThreadsTableSeeder::Class);
        $this->call(UsersTableSeeder::Class);
        $this->call(UserSubjectAreasTableSeeder::Class);
        $this->call(ClassroomsTableSeeder::Class);
    }
}
