<?php

namespace App\Http\Requests\admin\tour_guide;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\admin\TourGuide;
class addTourGuideRequest extends FormRequest
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
            'name' => 'required|unique:Tour_guide|min:5|max:100',
            'phone' => 'required|unique:Tour_guide|min:10',
            'avatar' => 'required|unique:Tour_guide',
            'price' => 'required|unique:Tour_guide|numeric|gt:0|min:5|',
            'email' => 'required|unique:Tour_guide|email|min:5|max:25',
            'address' => 'required|unique:Tour_guide',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Please enter tour guide's name",
            'name.unique' => "The tour guide exist. Please choose other name",
            'name.min' => "Please type less 5 characters",
            'name.max' => "Please type lower than 100 characters",
            'phone.required' => "Please enter tour guide's phone",
            'phone.min' => "Please type less 10 number",
            'avatar.required' => "Please enter tour guide's avatar ",
            'avatar.unique' => "The tour guide exist. Please choose other avatar",
            'price.required' => "Please enter service's price",
            'price.min' => "Please type less 5 characters",
            'email.unique' => "The tour guide exist. Please choose other email",
            'email.email' => "Missing '@gmail.com' format in gmail. Please retype",
            'address.required' => "Please enter tour guide's address",
            'address.unique' => "The tour guide exist. Please choose other address",
            'description.required' => "Please enter tour guide's description"
        ];
    }
}
