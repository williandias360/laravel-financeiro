<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoMovimento>
 */
class TipoMovimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "Descricao" => fake()->word(),
            "Tipo" => fake()->randomElement(["C", "D"], $count = 1),
        ];
    }
}
