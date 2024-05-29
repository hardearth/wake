<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Membership;
use App\Models\MembershipCourse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MembershipCourse>
 */
class MembershipCourseFactory extends Factory
{
    protected $model = MembershipCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'courses_id' => Course::inRandomOrder()->first()->id, // Asegúrate de que hay cursos en la BD
            'memberships_id' => Membership::inRandomOrder()->first()->id, // Asegúrate de que hay membresías en la BD
            'created_user' => User::inRandomOrder()->first()->id, // Asegúrate de que hay usuarios en la BD
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            // 'deleted_at' => $this->faker->dateTime, // Descomentar si se va a simular registros borrados
        ];
    }
}
