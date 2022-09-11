<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Inscription;
use App\Models\Matiere;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        $studente = Inscription::where('classe_id', '3')->get()->count();

        $matieres = Matiere::where('classe_id', '3')->get();
        $kalanden = Inscription::where('classe_id', '3')->get();
        
        $cours = Cours::all();
        return view('enseignants.cours.index', compact('matieres','kalanden', 'cours', 'studente'));
    }


    public function create()
    {
        //les clés étrangères
        //fin foreignkey
        return view('enseignants.notes.create');
    
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'nom_du_cours'=>['required','string','max:225'],
                'nombre_heures'=>['required','string','max:225'],
                'matiere_id'=> 'required',
                'support' => 'required|mimes:pdf|max:5000',                
        ]);

        if($validatedData)
        {
            $filenname = time().'.'.$request->support->extension();  
            $request->support->move(public_path('uploads/cours'), $filenname);
            $cours = Cours::create(
                [
                    'nom_du_cours'=>$request['nom_du_cours'],
                    'nombre_heures'=>$request['nombre_heures'],                
                    'matiere_id'=>$request['matiere_id'],
                    'support'=>$filenname,
                ]
            );
        
        }
        return redirect('enseignant/cours')->with('success', 'cours ajouté avec succès');
  
     


    }

}
