<?php

namespace App\Http\Requests\admin\account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class EditManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $id;

    public function __construct(Request $request)
    {
        $this->id = (integer) $request->route()->accountAdmin;
    }

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
            'name' => 'required|unique:Admin,name,'.$this->id,
            'email' => 'required|email|unique:Admin,email,'.$this->id,
            'phone' => 'required',
            'address'=>'required',
            'role'=>'required'
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
            'address.required'=>'Address can not null',
            'role.required'=>'Role can not null',
        ];
    }
}
