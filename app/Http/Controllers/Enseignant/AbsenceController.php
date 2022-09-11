<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbsenceFormRequest;
use App\Models\Absence;
use App\Models\Cours;
use App\Models\Inscription;
use App\Models\Matiere;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        $studente = Inscription::where('classe_id', '3')->get()->count();

        $matieres = Matiere::where('classe_id', '3')->get();
        $kalanden = Inscription::where('classe_id', '3')->get();        
        $cours = Cours::all();
        $absences = Absence::all();
        return view('enseignants.abscences.index', compact('studente', 'matieres', 'absences', 'kalanden', 'cours'));
    }



    public function store(AbsenceFormRequest $request)
    {
        $data = $request->validated();
    
        $absence = new Absence();
        $absence->eleve_id = $data['eleve_id'];
        $absence->cours_id = $data['cours_id'];
        $absence->motifs = $data['motifs'];
        $absence->avertissements = $data['avertissements'];

        $absence->save();
        return redirect('enseignant/absences')->with('success', 'Affectation effectuée avec succès !');
    }
}
