<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NiveauFormRequest;
use App\Models\Niveaux;
use Illuminate\Http\Request;

class NiveauController extends Controller
{


    public function index()
    {
        $niveau = Niveaux::all();
        return view('admin.niveaux.index', compact('niveau') );

    }

    public function create()
    {
        $niveau = Niveaux::all();
        return view('admin.niveaux.create', compact('niveau'));
      
    }

    public function store(NiveauFormRequest $request)
    {
        $data = $request->validated();

        $niveau = new Niveaux();
        $niveau->niveau = $data['niveau'];

        $niveau->save();
        return redirect('admin/niveaux')->with('message', 'Le niveau a été ajouté !');
        
    }
}
