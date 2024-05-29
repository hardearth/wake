<?php

namespace Database\Factories;

use App\Models\CourseLesson;
use App\Models\CourseModule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseLesson>
 */
class CourseLessonFactory extends Factory
{
    protected $model = CourseLesson::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
            'description'       => $this->faker->realText,
            'course_modules_id' => CourseModule::all()->random()->id,
            'duration'          => rand(1000, 100000),
            'created_user'      => 1,
        ];
    }
}
