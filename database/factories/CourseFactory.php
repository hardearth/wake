<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->company;
        $categories=Category::all()->random(3)->pluck('id')->toArray();
        return [
            "name" => $name,
            "description" => $this->faker->realText(),
            "created_user" => 1,
            "slug" => $this->faker->uuid(),
            'teacher_id'=>User::all()->random()->id,
            'image'=>$this->faker->image('storage/app/public/course/',410,330, null, false),
            'language' => $this->faker->randomElement(['EN','ES']),
            'level' => $this->faker->randomElement(['A','B','I']),
            'categories' => $categories,
        ];
    }
}
