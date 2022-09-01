<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Secretaire;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class SecretaireController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $eleves = Eleve::count();

        $secretaires = Secretaire::all();
        return view('admin.secretaires.index', compact('secretaires', 'eleves', 'enseignants', 'users', 'classes'));
    }


    public function create()
    {
        $secretaires = Secretaire::all();
        return view('admin.secretaires.create', compact('secretaires'));
    }

    public function store(Request $request)
    {

        $data = $request->validate(
        [
            'nom' => ['required','string','max:225'],
            'prenom' => ['required','string','max:225'],
            'sexe' => ['required','string'],
            'adresse' => ['required','string','max:225'],
            'phone' => ['required','string','max:50'],
            'email' => ['required','string','email','max:50','unique:users'],
            'username' => ['required','string','max:50','unique:secretaires'],
            'password'=>['required','string'],
            
        ]);

        if($data)
        {
            $users =  User::create(
                [
                    'nom' => $request['nom'],
                    'prenom' => $request['prenom'],
                    'email' =>$request['email'],
                    'adresse' => $request['adresse'],
                    'phone' => $request['phone'],
                    'password' => bcrypt($request['password']),
                    'statut' => 'secretaire',
                ]);

                if($users)
                {
                    $secretaires = Secretaire::create(
                    [
                        'user_id' => $users->id,
                        'nom'=>$request['nom'],
                        'prenom'=>$request['prenom'],
                        'sexe'=>$request['sexe'],
                        'phone'=>$request['phone'],                              
                        'adresse'=>$request['adresse'],
                        'email'=>$request['email'],
                        'username'=>$request['username'],
                        'password' => bcrypt($request['password']),

                    ]);

                    $secretaires = Secretaire::all();

                    $classes = Classe::count();
                    $users = User::count();
                    $enseignants = Enseignant::count();
                    $eleves = Eleve::count();
                    
                    return view('admin.secretaires.index', compact('enseignants', 'eleves', 'classes', 'users', 'secretaires'))->with('success', 'Félicitaion !');
                             
                }
            }
    }

}
