<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectAreasTableSeeder extends Seeder
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
                'subject' => '数学'
            ],
            [
                'subject' => '英語'
            ],
            [
                'subject' => '国語'
            ],
            [
                'subject' => '理科'
            ],
            [
                'subject' => '社会'
            ]
        ];

        $class_params = array('1XS', '1XY', '2XS', '2XY', '3XS', '3XY');
        $now = Carbon::now();

        foreach ($subject_params as $subject_param) {
            $subject_param['updated_at'] = $now;
            $subject_param['created_at'] = $now;

            foreach ($class_params as $class_param) {
                $subject_param['classroom'] = $class_param;
                DB::table('subject_areas')->insert($subject_param);
            }
        }

    }
}
