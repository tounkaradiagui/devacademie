<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index()
    {
        
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $student = Inscription::where('statut', 'eleve')->get();
        // dd($student);
        return view('secretaires.eleves.index', compact('student', 'classes', 'users', 'enseignants'));
    }
}
