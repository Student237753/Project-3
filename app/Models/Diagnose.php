<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'dossierid',
        'symptoms',
        'caseexplanation',
        'research',
    ];

    public function dossier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Dossier::class, 'dossierid');
    }
}
