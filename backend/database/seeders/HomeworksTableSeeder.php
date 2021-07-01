<?php

namespace Database\Seeders;

use App\Models\Homework;
use Illuminate\Database\Seeder;

class HomeworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homework::factory()->count(100)->create();
    }
}
