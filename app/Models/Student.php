<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory; 

    protected $table = 'students';

    protected $fillable = [
        'numero_etudiant',
        'nom',
        'prenom',
        'niveau'
    ];
   

    /**
     * Relation entre un étudiant et ses notes.
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class, 'etudiant_id');
    }

    /**
     * Calcule la moyenne des notes de l'étudiant.
     */
    public function calculateAverage()
    {
        return $this->grades()->avg('note');
    }
}
