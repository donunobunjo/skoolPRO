<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentValidation extends FormRequest
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
            'Gender'=>'required',
            'RollNumber'=>'required|unique:students',
            'FullName'=>'required',
            'Class'=>'required',
            'State'=>'required',
            'Lg'=>'required',
            'Phone'=>'required',
            'Address'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'Gender.required' => 'You need to pick a gender',
            'RollNumber.required'  => 'You need to enter student roll number',
            'RollNumber.unique' => 'A student with this roll number exists',
            'FullName.required'  => 'You need to enter student name',
            'Class.required'  => 'You need to pick the student class',
            'State.required'  => 'You need to pick the student state',
            'Lg.required'  => 'You need to pick the student Local govt.',
            'Phone.required'  => 'You need to enter the student parent phone number',
            'Address.required'  => 'You need to enter student address',
        ];
    }
}
