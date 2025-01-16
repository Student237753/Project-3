<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'subject',
        'type',
        'appointment',
    ];

    protected $casts = [
        'appointment' => 'datetime', // Automatically cast to Carbon instance
    ];

    public function diagnose(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Diagnose::class, 'dossierid');
    }
}
