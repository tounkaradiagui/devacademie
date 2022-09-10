<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Http\Requests\ClasseFormRequest;
use App\Models\Inscription;
use App\Models\Niveaux;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        
        $classe = Classe::all();
        $classes = Classe::count();
        $niveau = Niveaux::all();
        $classess = Inscription::where('classe_id', '1')->get();
        return view('admin.classes.index', compact('classe', 'classess', 'niveau'));

    }
    
    public function create()
    {
        
        return view('admin.classes.index');
    }

    public function store(ClasseFormRequest $request)
    {
        $data = $request->validated();

        $classe = new Classe();
        $classe->niveau_id = $data['niveau'];
        $classe->libelle = $data['libelle'];

        $classe->save();
        return redirect('admin/classes')->with('success', 'La classe a été ajouté avec succès !');
        
    }

    public function edit($libelle)
    {
        $classe = Classe::find($libelle);
        return view('admin.classes.index', compact('classe'));
    }

    
    


}
