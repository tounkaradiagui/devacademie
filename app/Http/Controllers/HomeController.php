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
            
            $secretaires = secretaire::Where('user_id', $user->id)->first();
            return view('secretaires.dashboard', compact('secretaires'));
        }

        elseif ($user->statut == 'parent')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $eleves = Eleve::count();
            $classes = Classe::count();
            $parent = parents::Where('user_id', $user->id)->first();
            return view('parents.dashboard', compact('parent', 'eleves', 'enseignants', 'users', 'classes'));
        }

        elseif ($user->statut == 'eleve')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $eleves = Eleve::count();
            $classes = Classe::count();
            $eleve = Eleve::Where('user_id', $user->id)->first();
            return view('eleves.dashboard', compact('eleve', 'eleves', 'enseignants', 'users', 'classes'));
        }

        elseif ($user->statut == 'enseignant')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $eleves = Eleve::count();
            $classes = Classe::count();
            $enseignant = Enseignant::Where('user_id', $user->id)->first();
            return view('enseignants.dashboard', compact('enseignant', 'enseignants', 'eleves', 'users', 'classes'));
        }

        elseif ($user->statut == 'admin')
        {
            $enseignants = Enseignant::count();
            $users = User::count();
            $eleves = Eleve::count();
            $classes = Classe::count();
            return view('admin.dashboard', compact('classes', 'enseignants', 'eleves', 'users' ));
        }

        else
        {
            return view('home');
        }
    }
}
