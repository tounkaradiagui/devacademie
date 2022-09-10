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
        'phone',
        'adresse',
        'user_id',
        'password',
    ];


    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function parents()
    {
        return $this->hasMany(Inscription::class,'parent_id');

    }
}
