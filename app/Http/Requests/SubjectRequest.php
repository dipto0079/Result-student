<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectRequest extends FormRequest
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
            'subjects'=>[
                'required ',
                Rule::unique('subjects'),
            ],
        ];
    }
    public  function massages(){
        return [
            'subjects.required' => array(
                'messege' => 'Successfully Subject Add !!!',
                'alert-type' => 'success')

        ];

    }
}
