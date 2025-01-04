<?php

namespace Database\Factories;

use App\Models\Grade; 
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory 
{
    protected $model = Grade::class; 
    public function definition()
    {
        return [
            'etudiant_id' => Student::factory(),
            'elements_constitutifs_id' => $this->faker->numberBetween(1, 10),
            'note' => $this->faker->randomFloat(2, 0, 20),
            'session' => $this->faker->randomElement(['normale', 'rattrapage']),
            'date_evaluation' => $this->faker->date(),
        ];
    }

    /**
     * Indicate that the grade is for normal session
     */
    public function normale()
    {
        return $this->state(function (array $attributes) {
            return [
                'session' => 'normale',
            ];
        });
    }

    /**
     * Indicate that the grade is for rattrapage session
     */
    public function rattrapage()
    {
        return $this->state(function (array $attributes) {
            return [
                'session' => 'rattrapage',
            ];
        });
    }
}
