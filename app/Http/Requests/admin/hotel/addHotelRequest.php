<?php

namespace App\Http\Requests\admin\hotel;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\Hotel;
class addHotelRequest extends FormRequest
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
            'name'=>'required|unique:Hotel|min:15|max:100',
            'price'=>'required|numeric|gt:0',
            'address'=>'required|unique:Hotel|min:25|max:150'
        ];
    }
    public function messages(){
        return [
            'name.required'=>"Please enter hotel's name",
            'name.unique'=>"The hotel exist. Please choose other names",
            'name.min'=>"Please type less 15 characters",
            'name.max'=>"Please type lower than 100 characters",
            'address.required'=>"Please enter hotel's address",
            'address.unique'=>"The hotel exist. Please choose other address",
            'address.min'=>"Please type less 25 characters",
            'address.max'=>"Please type lower than 150 characters"
        ];
    }
}
