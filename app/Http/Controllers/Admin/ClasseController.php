<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Http\Requests\ClasseFormRequest;
use App\Models\Niveaux;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        
        $classe = Classe::all();
        $classes = Classe::count();
        $niveau = Niveaux::all();
        return view('admin.classes.index', compact('classe', 'classes', 'niveau'));

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
        $classe = Classe::fing($libelle);
        return view('admin.classes.index', compact('classe'));
    }

    
    


}
