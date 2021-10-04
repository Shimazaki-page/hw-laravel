<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        $classes = ['1X', '1Y', '2X', '2Y', '3X', '3Y'];
        foreach ($classes as $class) {
            $param = ['class_name' => $class];
            Classroom::create($param);
        }
    }
}
