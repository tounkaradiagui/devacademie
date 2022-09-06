<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AnneeFormRequest;
use App\Models\Annee;
use App\Models\Enseignant;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Niveaux;
use App\Models\User;
class AnneeController extends Controller
{

    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $eleves = Eleve::count();
        $annee = Annee::all();
        $niveau = Niveaux::all();
        return view('admin.annee.index', compact('annee', 'niveau', 'eleves', 'classes', 'users', 'enseignants'));
    }

    
    public function create()
    {
        return view('admin.annee.create_annee');
    }


    public function store(AnneeFormRequest $request)
    {
        $data = $request->validated();

        $annee = new Annee();

        $annee->libelle = $data['libelle'];
        $annee->date_de_debut = $data['date_de_debut'];
        $annee->date_de_fin = $data['date_de_fin'];

        $annee->save();
        return redirect('admin/annee')->with('success', 'Annee a été ajouté avec succès !');
        
    }
}
