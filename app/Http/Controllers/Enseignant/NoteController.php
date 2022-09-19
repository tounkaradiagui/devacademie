<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteFormRequest;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Niveaux;
use App\Models\Note;
use App\Models\Trimestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $enseignant = Enseignant::where('user_id', $user->id)->first();
        $matieres = Matiere::where('enseignant_id', $enseignant->id)->get();

        $studente = Inscription::where('classe_id', $enseignant->id)->get()->count();
        $studentes = Inscription::where('classe_id', $enseignant->id)->get();

        $notes = Note::where('trimestre_id', $enseignant->id)->get();
        
        $trimestres = Trimestre::all();

        return view('enseignants.notes.index', compact('matieres', 'notes', 'studentes', 'studente', 'trimestres'));
    }

    public function create()
    {
        //les clés étrangères
        //fin foreignkey
        return view('enseignants.notes.create');
    
    }


    public function store(NoteFormRequest $request)
    {
        $data = $request->validated();
    
        $note = new Note();
        $note->note = $data['note'];
        $note->eleve_id = $data['eleve_id'];
        $note->matiere_id = $data['matiere_id'];
        $note->appreciations = $data['appreciations'];
        $note->trimestre_id = $data['trimestre_id'];

        $note->save();
        return redirect('enseignant/notes')->with('success', 'La note a été ajouté avec succès !');
    }
}
