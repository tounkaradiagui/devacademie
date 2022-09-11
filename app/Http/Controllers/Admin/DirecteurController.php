<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Http\Request;

class DirecteurController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $student = Inscription::where('statut', 'eleve')->get()->count();

        $admin = admin::all();
        return view('admin.directeurs.index', compact('admin', 'student', 'enseignants', 'users', 'classes'));
    }


    public function create()
    {
        $admin = admin::all();
        return view('admin.directeurs.create', compact('admin'));
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
            'username' => ['required','string','max:50'],
            'password'=>['required','string'],
            
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
                    'statut' => 'admin',
                ]);

                if($users)
                {
                    $secretaires = admin::create(
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

                    return redirect('admin/directeurs')->with('success', 'Félicitaion directeur ajouté avec succès !');
                             
                }
            }
    }
}
