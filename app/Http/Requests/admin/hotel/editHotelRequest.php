<?php

namespace App\Http\Requests\admin\hotel;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\Hotel;
class editHotelRequest extends FormRequest
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
            'name'=>'required|min:15|max:100|unique:Hotel,name,'.request()->id,
            'price'=>'required|numeric|gt:0',
            'address'=>'required|min:25|max:150|unique:Hotel,address,'.request()->id
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Please Fill this field',
            'name.min'=>'Please fill more than 15 characters',
            'name.max'=>'Please fill less than 100 characters',
            'name.unique'=>"Hotel name $this->name exist, please choose others name",
            'address.required'=>'Please Fill this field',
            'address.min'=>'Please fill more than 25 characters',
            'address.max'=>'Please fill less than 150 characters',
            'address.unique'=>"Hotel name $this->address exist, please choose others name"
        ];
    }
}
