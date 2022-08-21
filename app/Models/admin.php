<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $fillable = [
    'image',
    'nom',
    'prenom',
    'sexe',
    'email',
    'adresse',
    'username',
    'password',
    'user_id',
];


    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }
}
