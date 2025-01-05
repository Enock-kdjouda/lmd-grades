<?php

namespace Database\Factories;

use App\Models\Grade; 
use App\Models\Student;
use App\Models\ElementConstitutif;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory 
{
    
    
        protected $model = \App\Models\Grade::class;
    
        public function definition()
        {
            return [
                'etudiant_id' => \App\Models\Student::factory(),
                'ec_id' => \App\Models\ElementConstitutif::factory(),
                'note' => $this->faker->randomFloat(2, 0, 20),
                'session' => $this->faker->randomElement(['normale', 'rattrapage']),
                'date_evaluation' => $this->faker->date(),
            ];
        }
    
    

    /**
     * Indiquer que la note est pour une session normale
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
     * Indiquer que la note est pour une session de rattrapage
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
