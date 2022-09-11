<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrimestreFormRequest;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Trimestre;
use App\Models\User;
use Illuminate\Http\Request;

class TrimestreController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $student = Inscription::where('statut', 'eleve')->get()->count();

        $trimestre = Trimestre::all();
        return view('secretaires.trimestres.index', compact('trimestre', 'classes', 'users', 'enseignants', 'student'));
    }

    public function store(TrimestreFormRequest $request)
    {
        $data = $request->validated();

        $trimestre = new Trimestre();
        $trimestre->nom_trimestre = $data['nom_trimestre'];

        $trimestre->save();
        return redirect('secretaire/trimestres/create')->with('success', 'Le trimestre a été ajouté avec succès');
    }


    public function edit($id)
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $student = Inscription::where('statut', 'eleve')->get()->count();

        $trimestre = Trimestre::findOrfail($id);
        return view('secretaires.trimestres.edit', compact('trimestre', 'classes', 'users', 'enseignants', 'student'));
    }


    public function update(TrimestreFormRequest $request, $id)
    {
        $data = $request->validated();

        $modifier = Trimestre::findOrfail($id);
        $modifier->nom_trimestre = $data['nom_trimestre'];

        $modifier->update();


        return redirect('secretaire/trimestres/create')->with('success', 'le trimestre a été modifié avec succès');

    }
}
