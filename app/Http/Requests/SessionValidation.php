<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionValidation extends FormRequest
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
           // 'session'=>'required|max:9|min:9|unique:Session',
           'session'=>'required|max:9|min:9|unique:sessions',
        ];
    }

    public function messages()
    {
        return [
            'session.required' => 'You need to enter a session',
            'session.min'  => 'A session should not be less than 9 characters',
            'session.max'  => 'A session should not be more than 9 characters',
            'session.unique' => 'This session has already been entered',
        ];
    }
}
