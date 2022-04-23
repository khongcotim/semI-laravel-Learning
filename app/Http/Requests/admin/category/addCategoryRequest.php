<?php

namespace App\Http\Requests\admin\category;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\Category;
class addCategoryRequest extends FormRequest
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
            'name'=>'required|unique:Category|min:5|max:100',
            'slug'=>'required|unique:Category|min:5|max:100'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Please enter category's name",
            'name.unique'=>"The category exist. Please choose other name",
            'name.min'=>"Please type less 5 characters",
            'name.max'=>"Please type lower than 100 characters",
            'slug.required'=>"Please enter hotel's slug",
            'slug.unique'=>"The hotel exist. Please choose other slug",
            'slug.min'=>"Please type less 5 characters",
            'slug.max'=>"Please type lower than 100 characters"
        ];
    }
}
