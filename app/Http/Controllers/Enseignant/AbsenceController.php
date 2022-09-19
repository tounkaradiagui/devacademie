<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbsenceFormRequest;
use App\Models\Absence;
use App\Models\Cours;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index()
    {

        $user=Auth::user(); //current user (utilisateur connecté)
        $enseignant = Enseignant::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
        $absences = Absence::where('cours_id', $enseignant->id)->get();
        
        $kalanden = Inscription::where('classe_id', $enseignant->id)->get();

        $matieres = Matiere::where('classe_id', $enseignant->id)->get();
        $cours = Cours::where('matiere_id', $enseignant->id)->get();

        // $absences = Absence::where('cours_id', $enseignant->id)->get();

        return view('enseignants.abscences.index', compact('matieres', 'absences', 'cours', 'kalanden'));
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
