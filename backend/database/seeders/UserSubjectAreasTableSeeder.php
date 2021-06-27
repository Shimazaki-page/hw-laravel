<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubjectAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i < 52; $i++) {
            for ($n = 1; $n < 6; $n++) {
                $params = [
                    'user_id' => $i,
                    'subject_area_id' => $n,
                ];
                DB::table('user_subject_area')->insert($params);
            }

//            for ($i = 2; $i < 102; $i++) {
//                $params['user_id'] = $i;
//
//                for ($n = 1; $n < 6; $n++) {
//                    $params['subject_area_id'] = $n;
//                    DB::table('user_subject_area')->insert($params);
//                }
        }
    }
}
