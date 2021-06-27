<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'class_name' => '1X',
            ],
            [
                'class_name' => '1Y',
            ],
            [
                'class_name' => '2X',
            ],
            [
                'class_name' => '2Y',
            ],
            [
                'class_name' => '3X',
            ],
            [
                'class_name' => '3Y',
            ],
            [
                'class_name' => '講師',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['updated_at'] = $now;
            $param['created_at'] = $now;
        }
        DB::table('classrooms')->insert($params);
    }
}
