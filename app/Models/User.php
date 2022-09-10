<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'statut',
        'password',
        'adresse',
        'lieu_de_naissance',
        'phone',
        'image',
        'parent_id'

    ];

    public function admin()
    {
        return $this->hasMany(admin::class, 'user_id');
    }

    public function Parents()
    {
        return $this->hasMany(Parent::class, 'user_id');
    }

    public function Eleve()
    {
        return $this->hasMany(Eleve::class, 'user_id');
    }

    public function Enseignant()
    {
        return $this->hasMany(Enseignant::class, 'user_id');
    }

    public function secretiare()
    {
        return $this->hasMany(Secretaire::class, 'user_id');
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
