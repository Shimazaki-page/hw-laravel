<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects=['国語','数学','英語','理科','社会'];
        foreach ($subjects as $subject){
            $param=['subject_name'=>$subject];
            Subject::create($param);
        }
    }
}
