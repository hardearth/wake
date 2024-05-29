<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseModule>
 */
class CourseModuleFactory extends Factory
{
    protected $model = CourseModule::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->company,
            "description" => $this->faker->realText,
            "courses_id" => Course::all()->random()->id,
            "created_user" => 1
        ];
    }
}
