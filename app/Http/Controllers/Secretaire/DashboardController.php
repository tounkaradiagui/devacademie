<?php

namespace App\Http\Controllers\Secretaire;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Niveaux;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $student = Inscription::where('statut', 'eleve')->get()->count();
        $niveau = Niveaux::all();
        return view('secretaires.dashboard', compact('classes', 'users', 'enseignants', 'student', 'niveau'));
    }
}
