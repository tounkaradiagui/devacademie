<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    use HasFactory;

    protected $table = 'annee_scolaire';

    protected $fillable = [
        'libelle',
        'date_de_debut',
        'date_de_fin',
    ];
}
