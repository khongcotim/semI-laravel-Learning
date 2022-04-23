<?php

namespace App\Http\Requests\admin\FAQ;

use Illuminate\Foundation\Http\FormRequest;

class AddFAQRequest extends FormRequest
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
            'solution'=>'required|min:15|max:255',
            'answer'=>'required|min:15|max:255',
        ];
    }
    public function messages()
    {
        return [
            'solution.required'=>'Please fill this field',
            'solution.min'=>'Please fill more than 15 characters',
            'solution.max'=>'Please fill less than 255 characters',
            'answer.required'=>'Please fill this field',
            'answer.min'=>'Please fill more than 15 characters',
            'answer.max'=>'Please fill less than 255 characters',
        ];
    }
}
