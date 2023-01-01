<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount'=> $this->faker->randomFloat($maxDecimal = 2, $min =3, $max = 100),
            'paye_at' => $this->faker->dateTimeBetween($starDate = '-1 year', $endDate = 'now',
            $timezone = null)
        ];
    }
}
