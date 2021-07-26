<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 3; $i < 6; $i++) {
            $param = ['user_id' => $i, 'classroom_id' => 1];
            Student::create($param);
        }
        for ($i = 6; $i < 9; $i++) {
            $param = ['user_id' => $i, 'classroom_id' => 2];
            Student::create($param);
        }
        for ($i = 9; $i < 12; $i++) {
            $param = ['user_id' => $i, 'classroom_id' => 3];
            Student::create($param);
        }
        for ($i = 12; $i < 15; $i++) {
            $param = ['user_id' => $i, 'classroom_id' => 4];
            Student::create($param);
        }
        for ($i = 15; $i < 18; $i++) {
            $param = ['user_id' => $i, 'classroom_id' => 5];
            Student::create($param);
        }
        for ($i = 18; $i < 21; $i++) {
            $param = ['user_id' => $i, 'classroom_id' => 6];
            Student::create($param);
        }
    }
}
