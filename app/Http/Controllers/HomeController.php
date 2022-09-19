<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\admin;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Matiere;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\secretaire;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function index()
    {
        // return view('home');

        $user = Auth::user();
        // dd($user);
        
        if ($user->statut == 'secretaire')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $student = Inscription::where('statut', 'eleve')->get()->count();
            $classes = Classe::count();

            $student = Inscription::where('statut', 'eleve')->get()->count();
            $secretaires = secretaire::Where('user_id', $user->id)->first();
            return view('secretaires.dashboard', compact('secretaires', 'student', 'enseignants', 'users', 'classes'));
        }

        elseif ($user->statut == 'parent')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $classes = Classe::count();

            $inscrit = Inscription::all();

            $user=Auth::user(); //current user (utilisateur connecté)
            $parent = parents::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
            $candidatparent = Inscription::where('parent_id', $parent->id)->get()->count();

            $student = Inscription::where('parent_id', $parent->id)->get()->count();


            $parent = parents::Where('user_id', $user->id)->first();
            return view('parents.dashboard', compact('parent','student', 'candidatparent','enseignants', 'users', 'classes'));
        }

        elseif ($user->statut == 'eleve')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $classes = Classe::count();

            $eleve = Eleve::Where('user_id', $user->id)->first();
            return view('eleves.dashboard', compact('eleve',  'enseignants', 'users', 'classes'));
        }

        elseif ($user->statut == 'enseignant')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $classes = Classe::count();

            $user=Auth::user(); //current user (utilisateur connecté)
            $enseignant = Enseignant::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
            $studentes = Inscription::where('classe_id', $enseignant->id)->get();
            $studente = Inscription::where('classe_id', $enseignant->id)->get()->count();
            $absences = Absence::where('cours_id', $enseignant->id)->get();

            $enseignant = Enseignant::Where('user_id', $user->id)->first();
            return view('enseignants.dashboard', compact('enseignant', 'absences', 'enseignants', 'studente', 'users', 'classes'));
        }

        elseif ($user->statut == 'admin')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $student = Inscription::where('statut', 'eleve')->get()->count();
            $classes = Classe::count();

            

            
            return view('admin.dashboard', compact('classes', 'enseignants','student', 'users' ));
        }

        else
        {
            return view('home');
        }
    }
}
