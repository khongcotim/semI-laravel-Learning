<?php

namespace App\Http\Requests\admin\tour_guide;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\TourGuide;
class editTourGuideRequest extends FormRequest
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
            'name' => 'required|min:5|max:100|unique:Tour_guide,name,' . request()->id,
            'phone' => 'required|min:10|unique:Tour_guide,phone,' . request()->id,
            'price' => 'required||numeric|gt:0|min:5',
            'email' => 'required|email|unique:Tour_guide,email,' . request()->id,
            'address' => 'required|unique:Tour_guide,address,' . request()->id,
            'description' => 'required|unique:Tour_guide,description,' . request()->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Fill this field',
            'name.min' => 'Please fill more than 5 characters',
            'name.max' => 'Please fill less than 100 characters',
            'name.unique' => "Tour Guide name $this->name exist, please choose others name",
            'phone.required' => 'Please Fill this field',
            'phone.min' => 'Please fill in all 10 numbers',
            // 'phone.unique' => "Tour Guide phone $this->phone exist, please choose others phone",
            // 'avatar.required' => "Please enter tour guide's avatar ",
            // 'avatar.unique' => "Tour Guide avatar $this->avatar exist, please choose others avatar",
            'price.required' => 'Please Fill this field',
            'price.min' => "Please fill more than 5 characters",
            'email.unique' => "Tour Guide email $this->email exist, please choose others email",
            'email.email' => "Missing '@gmail.com' format in gmail. Please retype",
            'address.required' => 'Please Fill this field',
            'description.required' => 'Please Fill this field',
        ];
    }
}
