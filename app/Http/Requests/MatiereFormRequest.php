<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatiereFormRequest extends FormRequest
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
            'code_matiere' => [
                'required',
                'string',
                'max:100'
            ],

            'libelle' => [
                'required',
                'string',
                'max:100'
            ],

            'coefficient' => [
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

            'enseignant_id' => [
                'required',
            ],

        ];

        return $rules; 
    }
}
