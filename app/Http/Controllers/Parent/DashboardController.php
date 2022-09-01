<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;
use App\Models\Enseignant;
class DashboardController extends Controller
{
    public function index()
    {
       
        return view('parents.dashboard');
    }
}
