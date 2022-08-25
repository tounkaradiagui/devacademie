<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
use App\Models\Niveaux;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $eleves = Eleve::count();
        $enseignant = Enseignant::all();
        return view('admin.enseignants.index', compact('enseignant', 'eleves', 'classes', 'users', 'enseignants'));
    }
    
    public function create()
    {
        $niveau = Niveaux::all();
        $classe = Classe::all();
        $enseignant = Enseignant::all();
        return view('admin.enseignants.create', compact('niveau', 'classe', 'enseignant'));
    }
}
