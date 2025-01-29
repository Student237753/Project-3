<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Treatments extends Model
{

    protected $fillable = ['diagnosisid', 'treatment', 'policy'];

    // Relatie met het Diagnosis model (belongs to)
    public function diagnosis(): BelongsTo
    {
        // Verwijzing naar de 'diagnosisid' in de Diagnosis tabel
        return $this->belongsTo(Diagnosis::class, 'diagnosisid');
    }

}
