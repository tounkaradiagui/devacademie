<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupFormRequest;
use App\Models\Classe;
use App\Models\Niveaux;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        return view('parents.signup.index');
    }

    public function create()
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        return view('parents.signup.create', compact('niveau', 'classe'));
    }

    public function store(SignupFormRequest $request)
    {
        $data = $request->validated();

        $signup = new Classe();
        $signup->nom = $data['nom'];
        $signup->prenom = $data['prenom'];
        $signup->sexe = $data['sexe'];
        $signup->email = $data['email'];
        $signup->date_de_naissance = $data['date_de_naissance'];
        $signup->lieu_de_naissance = $data['lieu_de_naissance'];
        $signup->adresse = $data['locatite'];
        $signup->niveau_id = $data['niveau'];
        $signup->classe_id = $data['classe'];
        $signup->acte_de_naissance = $data['acte'];
        $signup->annee_id = $data['annee'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/parent/', $filename);
            $signup->image = $filename;
        }

        $signup->save();
        return redirect('admin/signup')->with('message', 'Votre pré-inscription a été reçu avec succès par dev-academie vous aurez un réponse au bout de deux semaines !');
        
    }


}

