<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentsRequest extends FormRequest
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
            'student_name'=>[
                'required ',
            ],
            'student_father'=>[
                'required ',
            ],
            'student_mother'=>[
                'required ',
            ],
            'email'=>[
                'required ',
                Rule::unique('students'),
            ],
        ];
    }
}
