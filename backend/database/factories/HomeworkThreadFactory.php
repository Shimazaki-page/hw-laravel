<?php

namespace Database\Factories;

use App\Models\HomeworkThread;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeworkThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomeworkThread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->realText(),
            'subject_area_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
//問題点：homeworkスレッドはクラスと強化によって定義されるが、クラスの取得が難しい
