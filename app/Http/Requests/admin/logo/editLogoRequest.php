<?php

namespace App\Http\Requests\admin\logo;

use Illuminate\Foundation\Http\FormRequest;

class editLogoRequest extends FormRequest
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
            // 'logo' => 'required'
        ];
    }
    public function messages()
    {
        return [
            // 'logo.required' => "Please enter images Logo ",
            // 'avatar.unique' => "Tour Guide avatar $this->avatar exist, please choose others avatar",

        ];
    }
}
