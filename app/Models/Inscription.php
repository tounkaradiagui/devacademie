<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Parent_;

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
        'adresse',
        'niveau_id',
        'classe_id',
        'annee_id',
        'parent_id',
        'acte_de_naissance',
        'matricule',
        'statut',
        'regime',
        'username',
        'password',
    ];

    public function niveaux()
    {
        return $this->belongsTo(Niveaux::class, 'niveau_id' );
    }


    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id' );
    }


    public function parents()
    {
        return $this->belongsTo(parents::class, 'parent_id');
    }

    public function eleves()
    {
        return $this->hasMany(Inscription::class,'eleve_id');

    }
}
