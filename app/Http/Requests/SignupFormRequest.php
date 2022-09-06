<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SignupFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // required|mimes:pdf|max:1000',

        $rules = [

            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],

            'matricule' => [
                'nullable',
            ],

            'username' => [
                'nullable',
            ],

            'password' => [
                'nullable',
            ],

            'regime' => [
                'nullable',
            ],
            
            'nom' => [
                'required',
                'string',
                'max:100'
            ],
            
            'prenom' => [
                'required',
                'string',
                'max:100'
            ],

            'sexe' => [
                'required',
            ],

            'email' => [
                'required',
                'string',
                'max:100'
            ],

            'date_de_naissance' => [
                'required',
                
            ],

            'lieu_de_naissance' => [
                'required',
                'string',
                'max:100'
            ],

            'localite' => [
                'required',
                'string',
                'max:100'
            ],

            'niveau_id' => [
                'required',
                
            ],

            'classe_id' => [
                'required',
               
            ],
            
            'parent_id' => [
                'required',
               
            ],

            'acte' => [
                'required',
                'mimes:pdf',
                'max:5000'
                
            ],

            'annee' => [
                'required',
                
            ],
        ];

        $user = Auth::User();


        return $rules; 
    }
}
