<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\parents;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Niveaux;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        $user=Auth::user(); //current user (utilisateur connecté)
        $parent = parents::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
        $candidatparent = Inscription::where('parent_id', $parent->id)->get();
        
        $student = Inscription::where('statut', 'eleve')->get()->count();
        $enseignants = Enseignant::count();
        $classes = Classe::count();
        $users = User::count();


        return view('parents.signup.index', compact('candidatparent', 'student', 'classes', 'enseignants'));
    }

    public function create()
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $annee = Annee::all();
        
        $classes = Classe::count();
        $enseignants = Enseignant::count();
       
        $user=Auth::user(); //current user (utilisateur connecté)
        $parent = parents::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
        $candidatparent = Inscription::where('parent_id', $parent->id)->get();

        return view('parents.signup.create', compact('niveau', 'classe', 'classes','enseignants', 'annee', 'candidatparent'));
    }

    public function store(Request $request)
    {
        $user = Auth::User();
        $data = $request->validate(
            [
                'nom'=>['required','string','max:225'],
                'prenom'=>['required','string','max:225'],                
                'sexe'=>['required','string','max:225'],
                'email'=>['required','string','email','max:50','unique:users'],
                'date_de_naissance'=>['required'],
                'lieu_de_naissance'=>['required','string','max:225'],
                'localite'=>['required','string','max:225'],
                'annee'=> 'required',
                'niveau_id'=> 'required',
                'classe_id'=> 'required',
                'acte_de_naissance'=>'required|mimes:pdf|max:5000',
                'image'=>'required|mimes:jpeg,png,jpg|max:5000',                               
                
            ]);

            if($data)
            {
                $filename =time().'.'.$request->acte_de_naissance->extension();
                $request->acte_de_naissance->move(public_path('uploads/documents'), $filename);

                $filenname =time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/parent'), $filenname);

                $user=Auth::user(); //current user (utilisateur connecté)
                $parent = parents::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
                // $candidatparent = Inscription::where('parent_id', $parent->id)->get();
                // dd($user);
                $inscrit = Inscription::create(
                    [
                        'nom'=>$request['nom'],
                        'prenom'=>$request['prenom'],                
                        'sexe'=>$request['sexe'],
                        'email'=>$request[ 'email'],
                        'date_de_naissance'=>$request['date_de_naissance'],
                        'lieu_de_naissance'=>$request['lieu_de_naissance'],
                        'adresse'=>$request['localite'],
                        'annee_id'=>$request['annee'],
                        'niveau_id'=>$request['niveau_id'],
                        'classe_id'=>$request['classe_id'],
                        'acte_de_naissance'=>$filename,
                        'image'=>$filenname,
                        'statut'=> 'candidat',
                        'parent_id'=>$parent->id,
                    ]
                );

            }
            
            return redirect('parent/signup')->with('success', ' Félicitation ! Votre pré-inscription a bien été reçue, vous recevrez une réponse au bout de deux semaines!');

        
    }


    public function edit($id)
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $annee = Annee::all();

        $candidatparent = Inscription::find($id);
        return view('parents.signup.edit', compact('candidatparent', 'niveau', 'classe', 'annee'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validated();

        $signup = Inscription::find($id);

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

