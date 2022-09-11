<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteFormRequest extends FormRequest
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

            'note' => [
                'required',
                'string',
                'max:100'
            ],

            'eleve_id' => [
                'required',
            ],

            'matiere_id' => [
                'required',
            ],

            'appreciations' => [
                'required',
                'string',
                'max:100'
            ],

            'trimestre_id' => [
                'required',
            ],

        ];

        return $rules; 
    }
}
