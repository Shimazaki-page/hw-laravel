<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSubjectAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 7; $i++) {
            for ($n = 1; $n < 6; $n++) {
                $params = [
                    'classroom_id' => $i,
                    'subject_area_id' => $n,
                ];
                DB::table('classroom_subject_areas')->insert($params);
            }
        }
    }
}
