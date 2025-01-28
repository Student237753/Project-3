<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    public function diagnosis(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosisid');
    }

}
