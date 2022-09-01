<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';
    
    protected $fillable = [
        'libelle',
        'niveau_id',

    ];

    public function niveau()
    {
        return $this->belongsTo(Niveaux::class, 'niveau_id' );
    }


    public function classe()
    {
        return $this->hasMany(Inscription::class, 'classe_id' );
    }

    public function enseignant()
    {
        return $this->hasMany(Enseignant::class, 'classe_id' );
    }

    public function matiere()
    {
        return $this->hasMany(Matiere::class, 'classe_id');
    }

}
