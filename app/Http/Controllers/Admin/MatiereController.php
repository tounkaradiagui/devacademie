<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatiereFormRequest;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Niveaux;
use App\Models\Enseignant;

class MatiereController extends Controller
{
    public function index()
    {

        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $student = Inscription::where('statut', 'Eleve')->get()->count();

        $classe = Classe::all();
        $niveau = Niveaux::all();
        $enseignant = Enseignant::all();

        $matieres = Matiere::all();
        return view('admin.matieres.index', compact('matieres', 'student', 'users', 'enseignants', 'classes', 'enseignant', 'niveau', 'classe'));
    }

    public function create()
    {
        return view('admin.matieres.index');
    }


    public function store(MatiereFormRequest $request)
    {

        $data = $request->validated();

        $essayer = new Matiere();
        $essayer->code_matiere = $data['code_matiere'];
        $essayer->libelle = $data['libelle'];
        $essayer->coefficient = $data['coefficient'];
        $essayer->niveau_id = $data['niveau_id'];
        $essayer->classe_id = $data['classe_id'];
        $essayer->enseignant_id = $data['enseignant_id'];

        $essayer->save();
        $classe = Classe::all();
        $niveau = Niveaux::all();
        $enseignant = Enseignant::all();

        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $eleves = Inscription::count();

        $matieres = Matiere::all();
        return view('admin.matieres.index', compact('matieres', 'niveau', 'classe', 'enseignant', 'eleves', 'enseignants', 'classes', 'users') );

        
    }


    public function destroy(Request $request)
    {
        $matieres = Matiere::find($request->matiere_delete_id);
        if($matieres)
        {
            $matieres->delete();
            return view('admin.matieres.index')->with('success', 'La matiere a été supprimée');

        }
        else
        {
            return view('admin.matieres.index')->with('success', 'Aucune matiere trouvée');

        }
    }
}
