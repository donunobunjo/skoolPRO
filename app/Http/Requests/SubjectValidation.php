<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectValidation extends FormRequest
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
            'category'=>'required',
            'subject'=>'required|unique:subjects'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'You need to pick a category',
            'subject.required'  => 'You need to enter a subject',
            'subject.unique'  => 'This subject has already been entered',
            
        ];
    }
}
