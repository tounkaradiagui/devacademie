<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteFormRequest;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Niveaux;
use App\Models\Note;
use App\Models\Trimestre;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $studente = Inscription::where('classe_id', '3')->get()->count();

        $matieres = Matiere::where('classe_id', '3')->get();
        $kalanden = Inscription::where('classe_id', '3')->get();
        $trimestre = Trimestre::all();
        
        $notes = Note::all();
        return view('enseignants.notes.index', compact('matieres','kalanden', 'notes', 'studente', 'trimestre'));
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
