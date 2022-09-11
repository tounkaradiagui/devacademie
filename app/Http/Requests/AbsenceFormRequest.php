<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsenceFormRequest extends FormRequest
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
            'eleve_id' => [
                'required',
            ],

            'cours_id' => [
                'required',
            ],

            'motifs' => [
                'required',
                'string',
                'max:100'
            ],

            'avertissements' => [
                'required',
                'string',
                'max:100'
            ],

        ];

        return $rules; 
    }
}
