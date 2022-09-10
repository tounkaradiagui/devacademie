<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\parents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('secretaires.parents.index', compact('parents',  'student', 'classes', 'users', 'enseignants'));
    }
}
