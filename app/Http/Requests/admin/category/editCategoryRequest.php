<?php

namespace App\Http\Requests\admin\category;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\Category;
class editCategoryRequest extends FormRequest
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
            'name'=>'required|min:5|max:100|unique:Category,name,'.request()->id,
            'slug'=>'required|min:5|max:100|unique:Category,slug,'.request()->id
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Please Fill this field',
            'name.min'=>'Please fill more than 5 characters',
            'name.max'=>'Please fill less than 100 characters',
            'name.unique'=>"Category name $this->name exist, please choose others name",
            'slug.required'=>'Please Fill this field',
            'slug.min'=>'Please fill more than 5 characters',
            'slug.max'=>'Please fill less than 100 characters',
            'slug.unique'=>"Category name $this->slug exist, please choose others name"
        ];
    }
}
