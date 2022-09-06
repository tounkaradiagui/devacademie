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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SignupFormRequest;
use App\Models\Niveaux;

class SignupController extends Controller
{
    public function index()
    {
        $inscrit = Inscription::all();
        $student = Inscription::where('statut', 'Eleve')->get()->count();
        $enseignants = Enseignant::count();
        $classes = Classe::count();
        $users = User::count();
        $classe = Classe::all();
        // dd($signup);
        return view('admin.signup.index', compact('inscrit', 'classe', 'users', 'student', 'enseignants', 'classes', 'users'));
       
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

                $filename =time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/parent'), $filename);

                $user=Auth::user();

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
                        'image'=>$filename,
                        'parent_id'=>$user->id,
                    ]
                );

            }
            
            return redirect('parents.signup.index')->with('success', ' Félicitations ! Votre pré-inscription a été reçu avec succès par dev-academie vous aurez une réponse au bout de deux semaines !');
    }


    public function edit($id)
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $annee = Annee::all();

        $classes = Classe::count();
        $users = User::count();
        $student = Inscription::where('statut', 'Eleve')->get()->count();
        $enseignants = Enseignant::count();

        $inscrit = Inscription::findOrfail($id);
        return view('admin.signup.edit', compact('inscrit', 'classe', 'niveau', 'classes', 'annee', 'student', 'enseignants', 'users'))->with('success', 'votre modification a ete prise en compte.');
    }

    public function update(Request $request, $id)
    {

        $valide = $request->validate([

            'matricule'=>"required",
            'regime'=>"required",
            'username'=>"required",
            'password'=>"required",
        ]);


        if($valide)
        {
            $valide = Inscription::whereId($id)->update(
                [
                    'matricule' =>$request['matricule'],
                    'regime' =>$request['regime'],
                    'username' =>$request['username'],
                    'password' =>bcrypt($request['password']),
                    'statut' => 'eleve',
                ]
            );
        }

        return redirect('admin/inscrit')->with('success', 'Félicitations ! la candidature a été acceptée');

    }

    public function findStudentConfirmed()
    {
        $studentconfirmed = Inscription::where('statut', 'Eleve')->get();
        $student = Inscription::where('statut', 'Eleve')->get()->count();
        // dd($studentconfirmed);
        return view('admin.eleves.index', compact('studentconfirmed', 'student'));
    }
    

}
