<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementConstitutif extends Model
{
    use HasFactory;

    protected $table = 'elements_constitutifs';
    
    protected $fillable = ['code', 'nom', 'coefficient', 'ue_id'];

    public function uniteEnseignement()
    {
        return $this->belongsTo(UniteEnseignement::class, 'ue_id');
    }
 

}
