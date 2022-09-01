<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'phone',
        'email',
        'adresse',
        'username',
        'user_id',
        'password',
    ];
    
    
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }
}
