<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

    public $timestamps = true;

    protected $fillable = [
        'dossierid',
        'symptoms',
        'caseexplanation',
        'research',
    ];

    // Relatie met het Dossier model (belongs to)
    public function dossier(): BelongsTo
    {
        // Verwijzing naar de 'dossierid' in de Dossier tabel
        return $this->belongsTo(Dossier::class, 'dossierid');
    }

    // Relatie met het Treatments model (has many)
    public function treatments(): HasMany
    {
        // Verwijzing naar de 'diagnosisid' in de Treatments tabel
        return $this->hasMany(Treatments::class, 'diagnosisid');
    }

    // De many to many relatie met het Organ model
    public function organs(): BelongsToMany
    {
        // Verwijzing naar de pivot tabel 'DiagnosisOrgans'
        return $this->belongsToMany(Organ::class, 'DiagnosisOrgans', 'idDiagnosis', 'idOrgans');
    }





}
