<?php

namespace App\Http\Requests\admin\service;

use Illuminate\Foundation\Http\FormRequest;

class editServiceRequest extends FormRequest
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
            'name' => 'required|min:5|max:100|unique:service,name,' . request()->id,
            'price' => 'required|min:5|max:100000000|unique:service,price,' . request()->id
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Fill this field',
            'name.min' => 'Please fill more than 5 characters',
            'name.max' => 'Please fill less than 100 characters',
            'name.unique' => "Service name $this->name exist, please choose others name",
            'price.required' => 'Please Fill this field',
            'price.min' => 'Please fill more than 5 characters',
            'price.max' => 'Please fill less than 100 characters',
        ];
    }
}
