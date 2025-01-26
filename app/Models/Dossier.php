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
        'urgency', 'appointment', 'organs', 'questions'
    ];

    protected $casts = [
        'appointment' => 'datetime',
    ];

    public function diagnoses(): HasMany
    {
        return $this->hasMany(Diagnose::class, 'dossierid');
    }

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }
}
