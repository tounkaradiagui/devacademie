<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\parents;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;

class ParentController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $users = User::count();
        $enseignants = Enseignant::count();
        $eleves = Eleve::count();
        $parents = parents::all();
        return view('admin.parents.index', compact('parents', 'eleves', 'classes', 'users', 'enseignants'));
    }

    public function create()
    {
        return view('admin.parents.create');
    }

    public function store(Request $request)
    {
        $parents = $request->validate([
            'nom' => ['required','string','max:225'],
            'prenom' => ['required','string','max:225'],
            'sexe' => ['required','string'],
            'adresse' => ['required','string','max:225'],
            'phone' => ['required','string','max:50'],
            'email' => ['required','string','email','max:50','unique:users'],
            'username' => ['required','string','max:50','unique:parents'],
            'password'=>['required','string','min:5','confirmed'],
        ]);
    }
}
