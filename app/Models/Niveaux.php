<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveaux extends Model
{
    use HasFactory;
    
    protected $table = 'niveaux';
    
    protected $fillable = [
        'niveau',

    ];

    public function classes()
    {
        return $this->hasMany(Classe::class, 'libelle' );
    }


    public function signup()
    {
        return $this->hasMany(Inscription::class, 'niveau_id' );
    }

   
    public function enseignant()
    {
        return $this->hasMany(Enseignant::class, 'niveau_id');
    }
    

    public function matiere()
    {
        return $this->hasMany(Matiere::class, 'niveau_id');
    }
}
