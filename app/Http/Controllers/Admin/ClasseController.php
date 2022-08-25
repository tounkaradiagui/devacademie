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
        return view('admin.classes.index', compact('classe', 'classes'));

    }
    
    public function create()
    {
        $niveau = Niveaux::all();
        return view('admin.classes.create', compact('niveau'));
    }

    public function store(ClasseFormRequest $request)
    {
        $data = $request->validated();

        $classe = new Classe();
        $classe->niveau_id = $data['niveau'];
        $classe->libelle = $data['libelle'];

        $classe->save();
        return redirect('admin/classes')->with('message', 'La classe a été ajouté avec succès !');
        
    }

    
    


}
