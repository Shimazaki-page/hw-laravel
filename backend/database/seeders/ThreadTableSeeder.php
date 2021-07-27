<?php

namespace Database\Seeders;

use App\Models\Thread;
use Illuminate\Database\Seeder;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            $threads['student_id'] = $i;
            for ($n = 1; $n <= 5; $n++) {
                $threads['homework_id'] = $n;
                Thread::create($threads);
            }
        }
        for ($i = 4; $i <= 6; $i++) {
            $threads['student_id'] = $i;
            for ($n = 6; $n <= 10; $n++) {
                $threads['homework_id'] = $n;
                Thread::create($threads);
            }
        }
        for ($i = 7; $i <= 9; $i++) {
            $threads['student_id'] = $i;
            for ($n = 11; $n <= 15; $n++) {
                $threads['homework_id'] = $n;
                Thread::create($threads);
            }
        }
        for ($i = 10; $i <= 12; $i++) {
            $threads['student_id'] = $i;
            for ($n = 16; $n <= 20; $n++) {
                $threads['homework_id'] = $n;
                Thread::create($threads);
            }
        }
        for ($i = 13; $i <= 15; $i++) {
            $threads['student_id'] = $i;
            for ($n = 21; $n <= 25; $n++) {
                $threads['homework_id'] = $n;
                Thread::create($threads);
            }
        }
        for ($i = 16; $i <= 18; $i++) {
            $threads['student_id'] = $i;
            for ($n = 26; $n <= 30; $n++) {
                $threads['homework_id'] = $n;
                Thread::create($threads);
            }
        }
    }
}
