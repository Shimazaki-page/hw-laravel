<?php

namespace Database\Seeders;

use App\Models\Homework;
use Illuminate\Database\Seeder;

class HomeworkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeworks = [
            'name' => '先生',
            'homework' => 'hogehoge問題集の全てをやってきてください。',
            'date' => now(),
        ];
        for ($i = 1; $i <= 6; $i++) {
            $homeworks['classroom_id'] = $i;
            for ($n = 1; $n <= 5; $n++) {
                $homeworks['subject_id'] = $n;
                Homework::create($homeworks);
            }
        }
    }
}
