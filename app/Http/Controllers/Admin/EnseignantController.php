<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnseignantFormRequest;
use App\Models\admin;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
use App\Models\Niveaux;
use App\Models\Inscription;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index()
    {
        
        
        $student = Inscription::where('statut', 'eleve')->get()->count();
        $classes = Classe::count();
        $users = User::count();
        $enseignant = Enseignant::count();
        
        $enseignants = Enseignant::all();
        return view('admin.enseignants.index', compact('enseignant', 'student', 'enseignants', 'users', 'classes'));
    }
    
    public function create()
    {

        //les clés étrangères
        $niveau = Niveaux::all();
        $classe = Classe::all();
        //fin foreignkey
        
        $enseignant = Enseignant::all();
        return view('admin.enseignants.create', compact('niveau', 'classe', 'enseignant'))->with('success', 'Enseignant ajouté avec succès');
    }


    public function store(Request $request)
    {

        $data = $request->validate(
        [
            'nom'=>['required','string','max:225'],
            'prenom'=>['required','string','max:225'],                
            'sexe'=>['required','string','max:225'],
            'phone'=>['required','string','max:225'],
            'email'=>['required','string','email','max:50','unique:users'],
            'date_dembauche'=>['required'],
            'adresse'=>['required','string','max:225'],
            'username'=>['required','string','max:225'],
            'password'=>['required','string','min:5'],
            'niveau_id'=> 'required',
            'classe_id'=> 'required',
            
        ]);

        
        if($data)
        {
            $user =  User::create(
                [
                    'nom' => $request['nom'],
                    'prenom' => $request['prenom'],
                    'email' =>$request['email'],
                    'adresse' => $request['adresse'],
                    'phone' => $request['phone'],
                    'username' => $request['username'],
                    'password' => bcrypt($request['password']),
                    'statut' => 'enseignant',
                ]);

                if($user)
                {
                    $enseignants = Enseignant::create(
                    [
                        'user_id' => $user->id,
                        'nom'=>$request['nom'],
                        'prenom'=>$request['prenom'],
                        'sexe'=>$request['sexe'],
                        'phone'=>$request['phone'],
                        'email'=>$request['email'],                             
                        'adresse'=>$request['adresse'],
                        'date_dembauche'=>$request['date_dembauche'],
                        'username'=>$request['username'],
                        'password' => bcrypt($request['password']),
                        'niveau_id'=> $request['niveau_id'],
                        'classe_id'=> $request['classe_id'],

                    ]);

                   
                    return redirect('admin/enseignants')->with('success', 'Enseignant ajouté avec succès');
                        
                        
                }
            }

    }


    public function edit($enseinant_id)
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $enseignant = Enseignant::find($enseinant_id);
        return view('admin.enseignants.edit', compact('enseignant', 'niveau', 'classe'));
    }


    public function update(Request $request, $enseignant_id)
    {
       
        $enseignant = Enseignant::find($enseignant_id);
        $enseignant->nom = $request->input('nom');
        $enseignant->prenom = $request->input('prenom');
        $enseignant->sexe = $request->input('sexe');
        $enseignant->email = $request->input('email');
        $enseignant->phone = $request->input('phone');
        $enseignant->date_dembauche = $request->input('date_dembauche');
        $enseignant->adresse = $request->input('adresse');
        $enseignant->niveau_id = $request->input('niveau_id');
        $enseignant->classe_id = $request->input('classe_id');

       
        $enseignant->update();

        return view('admin/enseignants')->with('success', 'Enseignant modifié avec succès');

    }


    






}
