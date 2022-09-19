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
use Illuminate\Support\Facades\Auth;

class MatiereController extends Controller
{
    public function index()
    {

        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $student = Inscription::where('statut', 'eleve')->get()->count();

        $classe = Classe::all();
        $niveau = Niveaux::all();

        // $user=Auth::user(); //current user (utilisateur connecté)
        $enseignant = Enseignant::all(); //id du parent qui a fait la demande
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
        return redirect('admin/matieres')->with('success', 'La matière a été ajouté avec succès !');

        
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
