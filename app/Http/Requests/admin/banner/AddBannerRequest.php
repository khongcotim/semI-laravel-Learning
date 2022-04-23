<?php

namespace App\Http\Requests\admin\banner;

use Illuminate\Foundation\Http\FormRequest;

class AddBannerRequest extends FormRequest
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
            'title'=>'min:5|max:100',
            'page'=>'required',
            'links'=>'min:5|max:100',
            'image'=>'required|image|max:8000'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Please fill in this field',
            'page.required'=>'Please fill in this field',
            'title.min'=>"This field can't less than 5 characters",
            'title.max'=>"This field can't more than 100 characters",
            'links.required'=>"Please fill this field",
            'links.min'=>"This field can't less than 5 characters",
            'links.max'=>"This field can't more than 100 characters",
            'contents.min'=>"Please fill lowest 1000 characters",
            'image.required'=>'Please choose your main image',
            'image.image'=>'Please choose image correctly',
            'image.max'=>"Your file can't more than 8000 KB"
        ];
    }
}
