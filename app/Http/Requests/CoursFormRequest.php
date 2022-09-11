<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursFormRequest extends FormRequest
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
        $rules = [

            'nom_du_cours' => [
                'required',
                'string',
                'max:100'
            ],

            'matiere_id' => [
                'required',
            ],

            'support' => [
                'required',
                'mimes:pdf',
                'max:5000'
            ],
            
            'nombre_heures' => [
                'required',
                'string',
                'max:100'
            ],


        ];

        return $rules; 
    }
}
