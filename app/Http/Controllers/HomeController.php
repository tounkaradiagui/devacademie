<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Eleve;
use App\Models\Enseignant;
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
            $parent = parents::Where('user_id', $user->id)->first();
            return view('parents.dashboard', compact('parent'));
        }

        elseif ($user->statut == 'eleve')
        {
            $eleve = Eleve::Where('user_id', $user->id)->first();
            return view('eleves.dashboard', compact('eleve'));
        }

        elseif ($user->statut == 'enseignant')
        {
            $enseignant = Enseignant::Where('user_id', $user->id)->first();
            return view('enseignants.dashboard', compact('enseignant'));
        }

        elseif ($user->statut == 'admin')
        {
            
            return view('admin.dashboard');
        }

        else
        {
            return view('home');
        }
    }
}
