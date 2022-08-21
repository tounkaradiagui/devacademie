<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Secretaire;
use Illuminate\Http\Request;

class SecretaireController extends Controller
{
    public function index()
    {
        $secretataire = Secretaire::all();
        return view('admin.secretaires.index', compact('secretaire'));
    }
}
