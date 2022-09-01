<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
use App\Models\Inscription;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SignupFormRequest;
use App\Models\Niveaux;

class SignupController extends Controller
{
    public function index()
    {
        $inscrit = Inscription::all();
        $eleves = Eleve::count();
        $enseignants = Enseignant::count();
        $classes = Classe::count();
        $users = User::count();
        $classe = Classe::all();
        // dd($signup);
        return view('admin.signup.index', compact('inscrit', 'classe', 'users', 'eleves', 'enseignants', 'classes', 'users'));
       
    }


    // public function index()
    // {
    //     $eleves = Eleve::count();
    //     $enseignants = Enseignant::count();
    //     $classes = Classe::count();
    //     $users = User::count();
    //     $signup = Inscription::all();
    //     return view('admin.signup.index', compact('signup', 'users', 'eleves', 'enseignants', 'classes'));
    // }

    // public function valider()
    // {
    //     $signup = Inscription::all();
    //     $eleves = Eleve::count();
    //     $enseignants = Enseignant::count();
    //     $classes = Classe::count();
    //     $users = User::count();
    //     // dd($signup);
    //     return view('admin.signup.edit', compact('signup', 'users', 'eleves', 'enseignants', 'classes'));
       
    // }


    public function store(SignupFormRequest $request)
    {
        $data = $request->validated();

        $inscrit = new Inscription();
        $inscrit->nom = $data['nom'];
        $inscrit->prenom = $data['prenom'];
        $inscrit->sexe = $data['sexe'];
        $inscrit->email = $data['email'];
        $inscrit->date_de_naissance = $data['date_de_naissance'];
        $inscrit->lieu_de_naissance = $data['lieu_de_naissance'];
        $inscrit->adresse = $data['localite'];
        $inscrit->niveau_id = $data['niveau_id'];
        $inscrit->classe_id = $data['classe_id'];
        $inscrit->annee_id = $data['annee'];


        if ($request->hasFile('acte')) {
            $file = $request->file('acte');

            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/documents/', $filename);
            $inscrit->acte_de_naissance = $filename;
        }


        if ($request->hasFile('image'))
        {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/parent/', $filename);
            $inscrit->image = $filename;
        }

            $inscrit->save();
            return view('parents.signup.index', compact('signup'))->with('message', 'Votre pré-inscription a été reçu avec succès par dev-academie vous aurez un réponse au bout de deux semaines !');
        
    }


    public function edit($eleve_id)
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();

        $classes = Classe::count();
        $annee = Annee::all();
        $users = User::count();
        $eleves = Eleve::count();
        $enseignants = Enseignant::count();
        $inscrit = Inscription::find($eleve_id);
        return view('admin.signup.edit', compact('inscrit', 'classe', 'niveau', 'classes', 'annee', 'eleves', 'enseignants', 'users'));
    }



    public function update(SignupFormRequest $request, $inscrit_id)
    {
        $data = $request->validated();

        $inscrit = Inscription::find($inscrit_id);

        $inscrit->nom = $data['nom'];
        $inscrit->prenom = $data['prenom'];
        $inscrit->sexe = $data['sexe'];
        $inscrit->email = $data['email'];
        $inscrit->date_de_naissance = $data['date_de_naissance'];
        $inscrit->lieu_de_naissance = $data['lieu_de_naissance'];
        $inscrit->adresse = $data['localite'];
        $inscrit->niveau_id = $data['niveau_id'];
        $inscrit->classe_id = $data['classe_id'];
        $inscrit->annee_id = $data['annee'];
        $inscrit->matricule = $data['matricule'];
        $inscrit->username = $data['username'];
        $inscrit->regime = $data['regime'];
        $inscrit->password = $data['password'];


        if ($request->hasFile('image')) {

            $path = 'uploads/parent/'.$inscrit->image;
            if (File::exist($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/parent/', $filename);
            $inscrit->image = $filename;
        }

        if ($request->hasFile('acte')) {

            $path = 'uploads/documents/'.$inscrit->acte_de_naissance;
            if (File::exist($path)) {
                File::delete($path);
            }


            $file = $request->file('acte');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/documents/', $filename);
            $inscrit->acte_de_naissance = $filename;
        }


        $eleves = Eleve::count();
        $enseignants = Enseignant::count();
        $classes = Classe::count();
        $users = User::count();
        
        $inscrit->update();
        return view('admin.signup.index', compact('eleves'))->with('success', 'Félicitation ! la candidature a été acceptée');

    }
}
