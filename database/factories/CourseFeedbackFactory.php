<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseFeedback>
 */
class CourseFeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rate' => $this->faker->numberBetween(1, 5),
            'comments' => $this->faker->paragraph,
            'course_id' => Course::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
