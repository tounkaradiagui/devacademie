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
}
