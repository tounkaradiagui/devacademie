<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\User;
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
        return view('secretaires.enseignants.index', compact('enseignant', 'student', 'enseignants', 'users', 'classes'));
    }
}
