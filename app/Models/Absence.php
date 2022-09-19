<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [

        'eleve_id',
        'cours_id',
        'motifs',
        'avertissements',

    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class,'matiere_id');

    }


    public function eleve()
    {
        return $this->belongsTo(Inscription::class,'eleve_id');

    }


    public function cours()
    {
        return $this->belongsTo(Cours::class,'cours_id');

    }
}
