<?php

namespace App\Http\Requests\admin\service;

use Illuminate\Foundation\Http\FormRequest;

class addServiceRequest extends FormRequest
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
            'name' => 'required|unique:service|min:5|max:100',
            'price' => 'required|unique:service|numeric|gt:0|min:5|max:100000000'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Please enter service's name",
            'name.unique' => "The service exist. Please choose other name",
            'name.min' => "Please type less 5 characters",
            'name.max' => "Please type lower than 100 characters",
            'price.required' => "Please enter service's price",
            'price.min' => "Please type less 5 characters",
            'price.max' => "Please type lower than 100000000 characters"
        ];
    }
}
