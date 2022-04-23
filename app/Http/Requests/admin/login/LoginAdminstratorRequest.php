<?php

namespace App\Http\Requests\admin\login;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminstratorRequest extends FormRequest
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
            'email'=>'required',
            'password'=>'required'
        ];
    }
    public function messages()
    {
        return [
        
            'email.required'=>'Email can not null',
            'password.required'=>'Password can not null'
        ];
    }
}
