<?php

namespace Database\Seeders;

use App\Models\HomeworkThread;
use Illuminate\Database\Seeder;

class HomeworkThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeworkThread::factory()->count(100)->create();
    }
}
