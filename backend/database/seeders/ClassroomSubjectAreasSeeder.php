<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $now = Carbon::now();
        for ($i = 1; $i < 7; $i++) {
            for ($n = 1; $n < 6; $n++) {
                $params = [
                    'classroom_id' => $i,
                    'subject_area_id' => $n,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                DB::table('classroom_subject_area')->insert($params);
            }
        }
    }
}
