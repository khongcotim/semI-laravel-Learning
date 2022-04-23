<?php

namespace App\Http\Requests\admin\tour;

use Illuminate\Foundation\Http\FormRequest;

class CreateTourRequest extends FormRequest
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
            'name'=>'required|unique:Tour,name',
            'distant'=>'required|numeric|gt:0',
            'image'=>'required',
            'time'=>'required',
            'des_photos'=>'required',
            'des_photos.*'=>'required',
            'from'=>'required',
            'to'=>'required',
            'map'=>'required',
            'address'=>'required',
            'service'=>'required',
            'price'=>'required',
            'description'=>'required',
            'limit'=>'required',
            'category'=>'required',
            'vehicle'=>'required',
            'hotel'=>'required',
        ];
        
    }
    public function messages()
    {
        return [
        
            'name.required'=>'Name can not null',
            'name.unique'=>"$this->name has existed",
            'image.required'=>'Tour image cant null',
            'image.required'=>'Time cant null',
            'des_photos.required'=>'Tour photos cant null',
            'des_photos.*.required'=>'Tour photos cant null',
            'from.required'=>'Tour from cant null',
            'to.required'=>'Tour to cant null',
            'map.required'=>'Tour map cant null',
            'address.required'=>'Tour address cant null',
            'service.required'=>'Tour service cant null',
            'price.required'=>'Tour price cant null',
            'description.required'=>'Tour description cant null',
            'limit.required'=>'Tour limit cant null',
            'category.required'=>'Tour category cant null',
            'vehicle.required'=>'Tour vehicle cant null',
            'hotel.required'=>'Tour hotel cant null',
        ];
    }
}
