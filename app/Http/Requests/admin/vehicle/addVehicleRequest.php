<?php

namespace App\Http\Requests\admin\vehicle;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\Vehicle;
class addVehicleRequest extends FormRequest
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
            'name'=>'required|unique:Vehicle|min:5|max:100',
            'price'=>'required|numeric|gt:0'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Please fill this field',
            'price.required'=>'Please fill this field',
            'name.min'=>'Please fill more than 5 characters',
            'name.max'=>'Please fill less than 100 characters',
            'name.unique'=>'This name exist, please choose others name'
        ];
    }
}
