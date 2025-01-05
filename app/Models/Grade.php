<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Grade extends Model
{
    protected $table = 'notes';

    protected $fillable = [
        'etudiant_id',
        'ec_id',
        'note',
        'session',
        'date_evaluation'
    ];

    protected $casts = [
        'date_evaluation' => 'datetime'
    ];

    // Définir la relation avec l'étudiant
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'etudiant_id');
    }

    public function elementConstitutif()
{
    return $this->belongsTo(ElementConstitutif::class, 'ec_id');
}

    
}
