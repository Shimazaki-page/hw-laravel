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
            'comment'=>$this->faker->text(255),
            'subject_area_id'=>$this->faker->numberBetween(1,30),
        ];
    }
}
