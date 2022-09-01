<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'phone',
        'email',
        'date_dembauche',
        'adresse',
        'niveau_id',
        'classe_id',
        'user_id',
        'username',
        'password',
    ];


    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function niveaux()
    {
        return $this->belongsTo(Niveaux::class, 'niveau_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function enseignant()
    {
        return $this->hasMany(Matiere::class, 'enseignant_id');
    }
}
