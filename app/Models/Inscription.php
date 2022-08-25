<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions';

    protected $fillable = [
        'image',
        'nom',
        'prenom',
        'sexe',
        'email',
        'date_de_naissance',
        'lieu_de_naissance',
        'localite',
        'niveau_id',
        'classe_id',
        'acte',
        'annee',
    ];
}
