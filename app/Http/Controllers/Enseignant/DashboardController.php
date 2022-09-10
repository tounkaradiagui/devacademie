<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Inscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $studente = Inscription::where('classe_id', '3')->get()->count();
        return view('enseignants.dashboard', compact('studente'));
    }
}
