<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\parents;
use App\Models\Classe;
use App\Models\Niveaux;
use App\Models\Annee;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Enseignant;

class ParentController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();

        $student = Inscription::where('statut', 'eleve')->get()->count();
        $parents = parents::all();

        $user=Auth::user(); //current user (utilisateur connecté)
        $parent = parents::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
        // $candidatparent = Inscription::where('parent_id', $parent->id)->get();

        return view('admin.parents.index', compact('parents',  'student', 'classes', 'users', 'enseignants'));
    }

    public function create()
    {
        
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $annee = Annee::all();

        $student = Inscription::where('statut', 'eleve')->get()->count();

        $classes = Classe::count();
        return view('admin.parents.create', compact('niveau', 'classe','student', 'annee', 'classes'));
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
            'password'=>['required','string','min:5'],
            
        ]);


        if($data)
        {
            $users =  User::create(
                [
                    'nom' => $request['nom'],
                    'prenom' => $request['prenom'],
                    'email' =>$request['email'],
                    'adresse' =>$request['adresse'],
                    'phone' =>$request['phone'],
                    'username'=>$request['username'],
                    'password' => bcrypt($request['password']),
                    'statut' => 'parent',
                ]);

                if($users)
                {
                    $parents = parents::create(
                    [
                        'user_id' => $users->id,
                        'nom'=>$request['nom'],
                        'prenom'=>$request['prenom'],
                        'sexe'=>$request['sexe'],
                        'phone'=>$request['phone'],                              
                        'adresse'=>$request['adresse'],
                        'email'=>$request['email'],
                        'password' => bcrypt($request['password']),

                    ]);
                    
                    return redirect('admin/parents')->with('success', 'Félicitaion le parent a été ajouté (e) avec succès !');
                             
                }
            }
    }


    public function DirectParentRegister(Request $request)
    {
        $data = $request->validate(
            [
                'nom' => ['required','string','max:225'],
                'prenom' => ['required','string','max:225'],
                'sexe' => ['required','string'],
                'adresse' => ['required','string','max:225'],
                'phone' => ['required','string','max:50'],
                'email' => ['required','string','email','max:50','unique:users'],
                'password'=>['required','string','min:5'],
                
            ]);
    
            if($data)
            {
                $users =  User::create(
                    [
                        'nom' => $request['nom'],
                        'prenom' => $request['prenom'],
                        'email' =>$request['email'],
                        'adresse' =>$request['adresse'],
                        'phone' =>$request['phone'],
                        'username'=>$request['username'],
                        'password' => bcrypt($request['password']),
                        'statut' => 'parent',
                    ]);
    
                    if($users)
                    {
                        $parents = parents::create(
                        [
                            'user_id' => $users->id,
                            'nom'=>$request['nom'],
                            'prenom'=>$request['prenom'],
                            'sexe'=>$request['sexe'],
                            'phone'=>$request['phone'],                              
                            'adresse'=>$request['adresse'],
                            'email'=>$request['email'],
                            'password' => bcrypt($request['password']),
    
                        ]);
    
                       
                        return redirect('/login')->with('success', 'Félicitations ! Vous êtes inscrit, veuillez entrez vos informations pour vous connecter' );
                                 
                    }
                }
    }



    
}
