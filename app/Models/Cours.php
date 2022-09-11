<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;


    protected $fillable = [

        'nom_du_cours',
        'matiere_id',
        'support',
        'nombre_heures',
    ];


    public function matiere()
    {
        return $this->belongsTo(Matiere::class,'matiere_id');

    }
}
