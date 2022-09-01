<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\User;
use App\Models\Inscription;
use App\Models\Niveaux;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $eleves = Eleve::count();
        $niveau = Niveaux::all();
        // $annee = Annee::all();
        return view('admin.dashboard', compact('classes', 'users', 'enseignants', 'eleves', 'niveau'));
    }
    

    

    
}
