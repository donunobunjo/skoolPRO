<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassValidation extends FormRequest
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
        return [
            'section'=>'required',
            'classs'=>'required|unique:classses'
        ];
    }
    public function messages()
    {
        return [
            'section.required' => 'You need to pick a section',
            'classs.required'  => 'You need to enter a class',
            'classs.unique'  => 'This class has already been entered',
            
        ];
    }
}
