<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'titulo'=> $this->faker->sentence(3),
        'descripcion'=> $this->faker->paragraph(1),
        'precio'=> $this->faker->randomFloat($maxDecimal = 2, $min =3, $max = 100),
        'stock'=> $this->faker->numberBetween(1, 10),
        'status'=> $this->faker->randomElement(['disponible', 'no-disponible'])
        ];
    }
}
