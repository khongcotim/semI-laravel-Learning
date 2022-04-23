<?php

namespace App\Http\Requests\admin\slides;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\Slides;
class AddSlidesRequest extends FormRequest
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
            'position'=>'required|max:50|numeric|unique:Slides|gt:0',
            'title'=>'required|min:5|max:50',
            'image'=>'required|image|max:8000',
            'link'=>'required|min:10|max:100',
            'max'=>'required|numeric|gt:0'
        ];
    }
    public function messages()
    {
        return [
            //position
            'position.required'=>'Please fill this field',
            'position.unique'=>'This position exist, please choose other',
            'position.numeric'=>'Position must be number',
            'position.not_in'=>'Position must bigger than 0',
            'position.max'=>'Position must less than 50 number',
            //title
            'title.required'=>'Please fill this field',
            'title.min'=>'Title must more than 5 character',
            'title.max'=>'Title must less than 50 character',
            //image
            'image.required'=>'Please fill this field',
            'image.image'=>'This field must be image',
            'image.max'=>'Your image size must not bigger than 8 MB',
             //link
             'link.required'=>'Please fill this field',
             'link.min'=>'Your Link can not less than 10 character',
             'link.max'=>'Your Link can not more than 100 character',
             //max
            'max.required'=>'Please fill this field',
            'max.numeric'=>'max must be number',
            'max.not_in'=>'max must bigger than 0',
        ];
    }
}
