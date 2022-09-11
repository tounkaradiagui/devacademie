<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $table = 'matieres';

    protected $fillable = [
        'code_matiere',
        'libelle',
        'coefficient',
        'niveau_id',
        'classe_id',
        'enseignant_id',

    ];


    public function niveaux()
    {
        return $this->belongsTo(Niveaux::class, 'niveau_id' );
    }


    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id' );
    }


    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'enseignant_id' );
    }

    public function matiere()
    {
        return $this->hasMany(Note::class,'matiere_id');

    }

    
    public function matieres()
    {
        return $this->hasMany(Cours::class, 'matiere_id' );
    }
    
}
