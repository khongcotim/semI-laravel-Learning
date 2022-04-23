<?php

namespace App\Http\Requests\admin\account;

use Illuminate\Foundation\Http\FormRequest;

class CreateManagerRequest extends FormRequest
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
            'name' => 'required|unique:Admin,name',
            'email' => 'required|email|unique:Admin,email',
            'phone' => 'required|unique:Admin|numeric|min:10',
            'password'=>'required|min:8',
            'address'=>'required',
            'role'=>'required',
            'avatar'=>'required|image'
        ];
    }
    public function messages()
    {
        return [
        
            'name.required'=>'Name can not null',
            'name.unique'=>"$this->name has existed",
            'email.required'=>'Email can not null',
            'email.unique'=>"$this->email has existed",
            'email.email'=>"Your email isn't right",
            'phone.required'=>'Phone can not null',
            'password.required'=>'Password can not null',
            'password.min'=>'Password Should be Minimum of 8 Character',
            'address.required'=>'Address can not null',
            'role.required'=>'Role can not null',
            'avatar.required'=>'Avatar cant null',
            'avatar.image'=>'You need choose image'
        ];
    }
}
