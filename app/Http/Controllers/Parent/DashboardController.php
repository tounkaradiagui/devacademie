<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Inscription;
use App\Models\User;
use App\Models\parents;
use Illuminate\Support\Facades\Auth;
use App\Models\Enseignant;
class DashboardController extends Controller
{
    public function index()
    {
        $student = Inscription::where('statut', 'eleve')->get()->count();
        $classes = Classe::count();
        
        $user=Auth::user(); //current user (utilisateur connecté)
        $parent = parents::where('user_id', $user->id)->first(); //id du parent qui a fait la demande
        $candidatparent = Inscription::where('parent_id', $parent->id)->get()->count();

        return view('parents.dashboard', compact('student', 'candidatparent', 'classes'));
    }
}
