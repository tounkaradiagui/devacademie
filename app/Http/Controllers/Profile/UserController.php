<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        return view('profile.user.index');
    }


    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->adresse = $request->input('adresse');
        $user->lieu_de_naissance = $request->input('lieu_de_naissance');
        $user->phone = $request->input('phone');

        if ($request->hasFile('image'))
        {
            $destination = 'uploads/profile/' .$user->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
        }

            $user->update();
            return redirect()->back()->with('message', 'Votre profile a été modifié avec succès !');
    }
}
