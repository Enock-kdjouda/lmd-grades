<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ElementConstitutif extends Model
{
    protected $table = 'elements_constitutifs';
    
    protected $fillable = [
        'code',
        'nom',
        'coefficient',
        'ue_id'
    ];

    /**
     * Get the UE that owns the element constitutif
     */
    public function ue(): BelongsTo
    {
        return $this->belongsTo(UE::class);
    }

    /**
     * Get the notes for the element constitutif
     */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class, 'elements_constitutifs_id');
    }
}