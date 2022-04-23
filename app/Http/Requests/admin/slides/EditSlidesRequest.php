<?php

namespace App\Http\Requests\admin\slides;

use Illuminate\Foundation\Http\FormRequest;

class EditSlidesRequest extends FormRequest
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
            'title'=>'min:5|max:50',
            'image'=>'image|max:8000',
            'link'=>'min:10|max:100',
            'max'=>'numeric|gt:0'
        ];
    }
    public function messages()
    {
        return [
            //title
            'title.min'=>'Title must more than 5 character',
            'title.max'=>'Title must less than 50 character',
            //image
            'image.image'=>'This field must be image',
            'image.max'=>'Your image size must not bigger than 8 MB',
             //link
             'link.min'=>'Your Link can not less than 10 character',
             'link.max'=>'Your Link can not more than 100 character',
             //max
            'max.numeric'=>'max must be number',
            'max.not_in'=>'max must bigger than 0',
        ];
    }
}
