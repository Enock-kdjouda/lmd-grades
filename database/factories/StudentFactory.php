<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'numero_etudiant' => 'E' . $this->faker->unique()->numberBetween(10000, 99999),
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'niveau' => $this->faker->randomElement(['L1', 'L2', 'L3']),
        ];
    }
}