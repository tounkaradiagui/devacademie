<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'email',
        'date_de_naissance',
        'lieu_de_naissance',
        'adresse',
        'regime',
        'username',
        'password',
        'niveau_id',
        'classe_id',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }
}
