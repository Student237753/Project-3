<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnose extends Model
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
}
