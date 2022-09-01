<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupFormRequest;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Niveaux;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SignupController extends Controller
{

    

    public function index()
    {
        $eleves = Eleve::count();
        $enseignants = Enseignant::count();
        $classes = Classe::count();
        $users = User::count();

        $inscrit = Inscription::all();
        return view('parents.signup.index', compact('inscrit', 'eleves'));
    }

    public function create()
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $annee = Annee::all();
        $inscrit = Inscription::all();
        return view('parents.signup.create', compact('niveau', 'classe', 'annee', 'inscrit'));
    }

    public function store(SignupFormRequest $request)
    {
        $validatedData = $request->validated();

        $signup = new Inscription; 
        $signup->nom = $validatedData['nom'];
        $signup->prenom = $validatedData['prenom'];
        $signup->sexe = $validatedData['sexe'];
        $signup->email = $validatedData['email'];
        $signup->date_de_naissance = $validatedData['date_de_naissance'];
        $signup->lieu_de_naissance = $validatedData['lieu_de_naissance'];
        $signup->adresse = $validatedData['localite'];
        $signup->niveau_id = $validatedData['niveau_id'];
        $signup->classe_id = $validatedData['classe_id'];
        $signup->annee_id = $validatedData['annee'];
        $signup->matricule = $validatedData['matricule'];
        $signup->username = $validatedData['username'];
        $signup->regime = $validatedData['regime'];
        $signup->password = $validatedData['password'];


        if ($request->hasFile('acte')) {
            $file = $request->file('acte');

            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/documents/', $filename);
            $signup->acte_de_naissance = $filename;
        }


        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/parent/', $filename);
            $signup->image = $filename;
        }

            $signup->save();
            return view('parents.signup.index')->with('success', 'Votre pré-inscription a été reçu avec succès par dev-academie vous aurez une réponse au bout de deux semaines !');
        
    }


    public function edit($eleve_id)
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $annee = Annee::all();

        $eleves = Eleve::count();
        $enseignants = Enseignant::count();
        $classes = Classe::count();
        $users = User::count();

        $inscrit = Inscription::find($eleve_id);
        return view('parents.signup.index', compact('inscrit', 'eleves', 'enseignants', 'classes', 'users' ,'niveau', 'classe', 'annee'));
    }


    public function update(SignupFormRequest $request, $eleve_id)
    {
        $validatedData = $request->validated();

        $signup = Inscription::find($eleve_id);

        $signup->nom = $validatedData['nom'];
        $signup->prenom = $validatedData['prenom'];
        $signup->sexe = $validatedData['sexe'];
        $signup->email = $validatedData['email'];
        $signup->date_de_naissance = $validatedData['date_de_naissance'];
        $signup->lieu_de_naissance = $validatedData['lieu_de_naissance'];
        $signup->adresse = $validatedData['localite'];
        $signup->niveau_id = $validatedData['niveau_id'];
        $signup->classe_id = $validatedData['classe_id'];
        $signup->annee_id = $validatedData['annee'];
        $signup->matricule = $validatedData['matricule'];
        $signup->username = $validatedData['username'];
        $signup->regime = $validatedData['regime'];
        $signup->password = $validatedData['password'];


        if ($request->hasFile('image')) {

            $path = 'uploads/parent/'.$signup->image;
            if (File::exist($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/parent/', $filename);
            $signup->image = $filename;
        }


        if ($request->hasFile('acte')) {

            $path = 'uploads/documents/'.$signup->acte_de_naissance;
            if (File::exist($path)) {
                File::delete($path);
            }


            $file = $request->file('acte');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/documents/', $filename);
            $signup->acte_de_naissance = $filename;
        }

        
        $signup->update();
        return view('parents.signup.index', ['update'=>$signup])->with('success', 'Félicitation ! la candidature a été acceptée');

    }
    

    


}

