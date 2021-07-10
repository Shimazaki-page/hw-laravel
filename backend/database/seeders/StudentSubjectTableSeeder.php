<?php

namespace Database\Seeders;

use App\Models\StudentSubject;
use Illuminate\Database\Seeder;

class StudentSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 18; $i++) {
            for ($n = 1; $n <= 5; $n++) {
                $param = ['student_id' => $i, 'subject_id' => $n];
                StudentSubject::create($param);
            }
        }
    }
}
