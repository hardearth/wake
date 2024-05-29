<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Course;
use App\Models\User;
use App\Models\UserBill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBill>
 */
class UserBillFactory extends Factory
{
    protected $model = UserBill::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'amount' => $this->faker->randomFloat(2, 10, 500),
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'countries_id' => Country::inRandomOrder()->first()->id, // Asegúrate de que hay países en la BD
            'city' => $this->faker->city,
            'cellphone' => $this->faker->randomNumber(9, true),
            'email' => $this->faker->email,
            'courses' => Course::limit($this->faker->randomNumber(1))->get()->random()->toJson(), // Ajusta según la estructura real de tus datos
            'payment_method' => $this->faker->randomElement(['coinpayment', 'free']),
            'users_id' => User::inRandomOrder()->first()->id, // Asegúrate de que hay usuarios en la BD
            'status' => $this->faker->randomElement(['P', 'A', 'C']),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            // 'deleted_at' => $this->faker->dateTime, // Descomentar si se va a simular registros borrados
        ];
    }
}
