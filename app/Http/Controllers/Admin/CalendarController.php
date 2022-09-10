<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\User;
use App\Models\Inscription;

class CalendarController extends Controller
{
    public function index()
    {
        $classes = Classe::count();
        $enseignants = Enseignant::count();
        $users = User::count();
        $student = Inscription::where('statut', 'eleve')->get()->count();
        return view('admin.calendar.index', compact('classes', 'enseignants', 'users', 'student'));
    }
}
