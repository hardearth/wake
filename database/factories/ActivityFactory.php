<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    protected $model = Activity::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'second_name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d H:i:s'),
            'banner_image' => $this->faker->imageUrl(),
            'featured_image' => $this->faker->imageUrl(),
            'activity_categories_id' => 1,
            'users_id' => User::inRandomOrder()->first()->id,
            'created_users_id' => User::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
