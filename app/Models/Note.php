<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    protected $table = 'notes';

    protected $fillable = [
        'note',
        'eleve_id',
        'matiere_id',
        'aprreciations',
        'trimestre_id',

    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class,'matiere_id');

    }

    public function eleves()
    {
        return $this->belongsTo(Inscription::class,'eleve_id');

    }


  
}
