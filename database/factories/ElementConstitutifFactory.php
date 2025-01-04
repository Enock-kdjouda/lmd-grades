<?php

namespace Database\Factories;

use App\Models\ElementConstitutif;
use App\Models\UE;
use Illuminate\Database\Eloquent\Factories\Factory;

class ElementConstitutifFactory extends Factory
{
    protected $model = ElementConstitutif::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'nom' => $this->faker->words(3, true),
            'coefficient' => $this->faker->randomFloat(2, 1, 5),
            'ue_id' => UE::factory(),
        ];
    }
}