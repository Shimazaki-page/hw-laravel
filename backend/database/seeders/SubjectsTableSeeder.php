<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject_params = [
            [
                'subject_name' => '数学'
            ],
            [
                'subject_name' => '英語'
            ],
            [
                'subject_name' => '国語'
            ],
            [
                'subject_name' => '理科'
            ],
            [
                'subject_name' => '社会'
            ]
        ];

        $now = Carbon::now();

        foreach ($subject_params as $subject_param) {
            $subject_param['updated_at'] = $now;
            $subject_param['created_at'] = $now;
            DB::table('subjects')->insert($subject_param);
        }
    }
}
