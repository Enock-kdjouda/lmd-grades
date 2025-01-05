<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteEnseignement extends Model
{
    use HasFactory;

    protected $table = 'unites_enseignement';
    protected $fillable = ['code', 'nom', 'credits_ects', 'semestre'];

    public function elementsConstitutifs()
    {
        return $this->hasMany(ElementConstitutif::class, 'ue_id');
    }
}
