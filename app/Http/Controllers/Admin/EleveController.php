<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index()
    {
        $eleve = Eleve::all();
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $eleves = Eleve::count();
        return view('admin.eleves.index', compact('eleve', 'eleves', 'classes', 'users', 'enseignants'));
    }

    public function create()
    {
            $eleve = Eleve::all();
            return view('eleve', compact('eleve'));
    }


    public function store(Request $request)
    {
        $nagnana = $request->validate(
            [

                'image'=>['nullable', 'mimes:jpg,jpeg,png'],
                'matricule'=>['required','string','max:225'],
                'nom'=>['required','string','max:225'],
                'prenom'=>['required','string','max:225'],
                'sexe'=>['required','string','max:225'],                
                'email'=>['required','string','email','max:50','unique:users'],
                'date_de_naissance'=>['required','date'],
                'lieu_de_naissance'=>['required','string','max:225'],
                'adresse'=>['required','string','max:225'],
                'regime'=>['required','string','max:225'],
                'username'=>['required','string','max:225'],
                'password'=>['required','string','min:5','confirmed'],
                'classe_id'=>'required',
               
            ]
            );

            if($nagnana)
            {
                $user =  User::create(
                    [
                        'nom' => $request['nom'],
                        'prenom' => $request['prenom'],
                        'email' =>$request['email'],
                        'password' => bcrypt($request['password']),
                        'status' => 'eleve',
                    ]
                    
                    );

                    if($user)
                    {
                        $secretaire = Eleve::create(
                            [
                               
                                'nom'=>$request['nom'],
                                'prenom'=>$request['prenom'],
                                'adresse'=>$request['adresse'],
                                'phone'=>$request['phone'],                              
                                'classes_id'=> $request['classes_id'],
                                'email'=>$request['email'],
                                'username'=>$request['username'],
                                'password' => bcrypt($request['password']),

                            ]
                            );
                            
                                                    
                            $eleve = Eleve::all();
                            $classes = classe::all();
                            return view('admin.secretaire.index', compact('eleve', 'classes'));
                            

                    }
                }

        
         
    }
}
