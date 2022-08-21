<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnneeFormRequest extends FormRequest
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
            
            'libelle' => [
                'required',
                'string',
                'max:100'
            ],
            
            'date_de_debut' => [
                'required',
            ],

            'date_de_fin' => [
                'required',
            ],
        ];

        return $rules; 
    }
}
