<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
use App\Models\Inscription;
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
            $student = Inscription::where('statut', 'Eleve')->get()->count();
            $secretaires = secretaire::Where('user_id', $user->id)->first();
            return view('secretaires.dashboard', compact('secretaires', 'student'));
        }

        elseif ($user->statut == 'parent')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $student = Inscription::where('statut', 'Eleve')->get()->count();
            $classes = Classe::count();
            $inscrit = Inscription::all();

            $parent = parents::Where('user_id', $user->id)->first();
            return view('parents.dashboard', compact('parent', 'inscrit','student', 'enseignants', 'users', 'classes'));
        }

        elseif ($user->statut == 'eleve')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $student = Inscription::where('statut', 'Eleve')->get()->count();
            $classes = Classe::count();
            $student = Inscription::where('statut', 'Eleve')->get();

            $eleve = Eleve::Where('user_id', $user->id)->first();
            return view('eleves.dashboard', compact('eleve', 'student', 'enseignants', 'users', 'classes'));
        }

        elseif ($user->statut == 'enseignant')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $student = Inscription::where('statut', 'Eleve')->get()->count();
            $classes = Classe::count();
            $enseignant = Enseignant::Where('user_id', $user->id)->first();
            return view('enseignants.dashboard', compact('enseignant', 'enseignants', 'student', 'users', 'classes'));
        }

        elseif ($user->statut == 'admin')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $student = Inscription::where('statut', 'Eleve')->get()->count();
            $classes = Classe::count();
            return view('admin.dashboard', compact('classes', 'enseignants', 'student', 'users' ));
        }

        else
        {
            return view('home');
        }
    }
}
