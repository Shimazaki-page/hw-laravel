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
            'classroom_subject_id' => mt_rand(1, 30),
        ];
    }
}
