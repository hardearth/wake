<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseRegister;
use App\Models\User;
use App\Models\UserBill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseRegistered>
 */
class CourseRegisterFactory extends Factory
{
    protected $model = CourseRegister::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'courses_id' => Course::inRandomOrder()->first()->id,
            'users_id' => User::where('roles_id',3)->inRandomOrder()->first()->id,
            'user_bill_id' => UserBill::where('status','A')->get()->random()->id,
            'created_user' => 1 ,
            'created_at' => now(),
            'updated_at' => now(),
            // 'deleted_at' is null by default
        ];
    }
}
