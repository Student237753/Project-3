<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Organ extends Model
{
    use HasFactory;

    //naam van de tabel in de database
    protected $table = 'organs';

    // Zet timestamps uit voor dit model
    public $timestamps = false;

    protected $fillable = ['name'];

    // De many to many relatie met het Diagnosis model
    public function diagnoses(): BelongsToMany
    {
        // Verwijzing naar de pivot tabel 'DiagnosisOrgans'
        return $this->belongsToMany(Diagnosis::class, 'DiagnosisOrgans', 'idOrgans', 'idDiagnosis');
    }



}
