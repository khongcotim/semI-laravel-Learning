<?php

namespace App\Http\Requests\admin\discount;

use Illuminate\Foundation\Http\FormRequest;

class AddDiscountRequest extends FormRequest
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
            'name'=>'required|min:10|max:2000',
            'id_tour'=>'required',
            'percent_reduce'=>'required|digits_between:1,100',
            'limit'=>'required|gt:0|numeric|max:10000|min:1',
            'time'=>'required|min:1|max:100|gt:0',
        ];
    }
    public function messages()
    {
        return [
            //name
            'name.required'=>'Please fill this field',
            'id_tour.required'=>'Please choose the tour what is apply discount code',
            'name.min'=>"Discount's name must more than 10 characters",
            'name.max'=>"Discount's name must less than 2000 characters",
            //percent_reduce
            'percent_reduce.required'=>'Please fill this field',
            'percent_reduce.digits_between'=>"Percent reduce just beetween 1% and 100%"
        ];
    }
}
