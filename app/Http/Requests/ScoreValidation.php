<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreValidation extends FormRequest
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
            'FullName'=>'required',
            'FirstCA'=>'numeric|min:1|max:20',
            'SecondCA'=>'numeric|min:1|max:20',
            'Exam'=>'numeric|min:1|max:60',
        ];
    }

    public function messages()
    {
        return [
            'FullName.required' =>'You need to pick a student',
            'FirstCA.numeric'  => 'You need to enter a figure as First CA score',
            'FirstCA.min'  => 'First CA cant be less than 1',
            'FirstCA.max'  => 'First CA cant be greater than 20',
            'SecondCA.numeric'  => 'You need to enter a figure as Second CA score',
            'SecondCA.min'  => 'Second CA cant be less than 1',
            'SecondCA.max'  => 'Second CA cant be greater than 20',
            'Exam.numeric'  => 'You need to enter a figure as Exam score',
            'Exam.min'  => 'Exam cant be less than 1',
            'Exam.max'  => 'Exam cant be greater than 60',
            
        ];
    }
}
