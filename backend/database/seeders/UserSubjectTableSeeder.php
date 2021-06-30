<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        for ($i = 2; $i < 52; $i++) {
            for ($n = 1; $n < 6; $n++) {
                $params = [
                    'user_id' => $i,
                    'subject_id' => $n,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                DB::table('user_subject')->insert($params);
            }
        }
    }
}
