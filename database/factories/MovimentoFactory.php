<?php

namespace Database\Factories;

use App\Models\TipoMovimento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimento>
 */
class MovimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "Descricao" => fake()->sentence(),
            "Valor" => fake()->randomFloat(2, -10000, 10000),
            "DataMovimento" => fake()->dateTimeThisYear(),
            "CodigoTipoMovimento" => fake()->randomElement([1, 2, 3, 4, 5]),
            "user_id" => fake()->randomElement([1, 2]),
        ];
    }
}
