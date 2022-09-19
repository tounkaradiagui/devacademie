<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        
        $user=Auth::user(); //current user (utilisateur connecté)
        $enseignant = Enseignant::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
        $studente = Inscription::where('classe_id', $enseignant->id)->get()->count();
        $studentes = Inscription::where('classe_id', $enseignant->id)->get();

        return view('enseignants.dashboard', compact('studente', 'studentes'));
    }
}
