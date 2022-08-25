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

    public function edit($niveau_id)
    {
        $niveau = Niveaux::find($niveau_id);
        return view('admin.niveaux.edit', compact('niveau'));
    }


    public function update(NiveauFormRequest $request, $niveau_id)
    {
        $data = $request->validated();

        $niveau = Niveaux::find($niveau_id);
        $niveau->niveau = $data['niveau'];

        $niveau->update();


        return redirect('admin/niveaux')->with('message', 'le niveau a été modifié avec succès');

    }

    public function destroy(Request $request)
    {
        $niveau = Niveaux::find($request->niveau_delete_id);
        if($niveau)
        {
            $niveau->delete();
            return redirect('admin/niveaux')->with('message', 'Le niveau a été supprimer');

        }
        else
        {
            return redirect('admin/niveaux')->with('message', 'Aucun niveau trouvé');

        }
    }
}
