<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    public $timestamps = false;

    protected $fillable = ['diagnosisid', 'treatments'];

    public function treatment(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Treatments::class, 'diagnosisid');
    }
}

