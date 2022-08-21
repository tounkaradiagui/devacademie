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
}
