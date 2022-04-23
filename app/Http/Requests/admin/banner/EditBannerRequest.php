<?php

namespace App\Http\Requests\admin\banner;

use Illuminate\Foundation\Http\FormRequest;

class EditBannerRequest extends FormRequest
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
            'image'=>'image|max:8000'
        ];
    }
    public function messages()
    {
        return [
            'page.required'=>"Please select your page",
            'title.min'=>"This field can't less than 5 characters",
            'title.max'=>"This field can't more than 100 characters",
            'links.min'=>"This field can't less than 5 characters",
            'links.max'=>"This field can't more than 100 characters",
            'contents.min'=>"Please fill lowest 1000 characters",
            'image.image'=>'Please choose image correctly',
            'image.max'=>"Your file can't more than 8000 KB"
        ];
    }
}
