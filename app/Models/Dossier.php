<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dossier extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'type', 'subject', 'research', 'symptoms', 'treatment',
        'policy', 'appointment', 'organs', 'questions'
    ];

    protected $casts = [
        'appointment' => 'datetime', // Zet appointment in datetime format
    ];

    // Relatie met het Diagnosis model (has many)
    public function diagnoses(): HasMany
    {
        // Verwijzing naar de 'dossierid' in de Diagnosis tabel
        return $this->hasMany(Diagnosis::class, 'dossierid');
    }

    // Relatie met het Treatments model (has many)
    public function treatments(): HasMany
    {
        // Verwijzing naar de 'dossierid' in de Treatments tabel
        return $this->hasMany(Treatments::class, 'dossierid');
    }

}
