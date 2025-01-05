<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UniteEnseignement>
 */
class UniteEnseignementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\UniteEnseignement::class;
    public function definition(): array
    {
        return [
            'code' => 'UE' . $this->faker->unique()->numberBetween(10, 99),
            'nom' => $this->faker->words(3, true), // Exemple: "Mathématiques Appliquées"
            'credits_ects' => $this->faker->numberBetween(1, 12),
            'semestre' => $this->faker->numberBetween(1, 6),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
