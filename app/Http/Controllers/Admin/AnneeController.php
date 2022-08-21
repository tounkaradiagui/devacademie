<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AnneeFormRequest;
use App\Models\Annee;
class AnneeController extends Controller
{

    public function index()
    {
        $annee = Annee::all();
        return view('admin.annee.index', compact('annee'));
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
        return redirect('admin/annee')->with('message', 'Annee a été ajouté avec succès !');
        
    }
}
