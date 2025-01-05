<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UniteEnseignement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElementConstitutif>
 */
class ElementConstitutifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = \App\Models\ElementConstitutif::class;
    public function definition(): array
    {
        return [
            'code' => 'EC' . $this->faker->unique()->numberBetween(100, 999),
            'nom' => $this->faker->words(2, true), // Exemple: "Analyse Mathématique"
            'coefficient' => $this->faker->numberBetween(1, 5),
            'ue_id' => UniteEnseignement::factory(), // Associe l'EC à une UE existante via une factory
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
