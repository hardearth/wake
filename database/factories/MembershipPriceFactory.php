<?php

namespace Database\Factories;

use App\Models\Membership;
use App\Models\MembershipPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MembershipPrice>
 */
class MembershipPriceFactory extends Factory
{
    protected $model = MembershipPrice::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'amount' => $this->faker->randomFloat(2, 10, 500), // Precio entre 10 y 500
            'memberships_id' => Membership::inRandomOrder()->first()->id, // Asegúrate de que hay membresías en la BD
            'status' => $this->faker->randomElement(['A', 'I']),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            // 'deleted_at' => $this->faker->dateTime, // Descomentar si se va a simular registros borrados
        ];
    }
}
