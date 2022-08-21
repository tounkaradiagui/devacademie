<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'adresse',
        'eleve_id',
        'user_id',
        'username',
        'password',
    ];


    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }
}
