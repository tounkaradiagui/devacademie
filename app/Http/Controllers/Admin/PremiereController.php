<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Niveaux;
use App\Models\User;
use Illuminate\Http\Request;

class PremiereController extends Controller
{
    public function index()
    {
        $users = User::count();
        $enseignants = Enseignant::count();

        $student = Inscription::where('statut', 'eleve')->get()->count();


        $classes = Inscription::where('classe_id', '1')->get();

        return view('admin.classes.premiere', compact('classes', 'student', 'enseignants', 'users'));
    }
}
