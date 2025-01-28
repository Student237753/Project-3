<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function dossier(): BelongsTo
    {
        return $this->belongsTo(Dossier::class, 'dossierid');
    }
    public function treatments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Treatments::class, 'diagnosisid');
    }

}
