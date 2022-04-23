<?php

namespace App\Http\Requests\customer\booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'name'=>'required',
            'id_card'=>'required|numeric|min:10',
            'email'=>'required|email',
            'phone'=>'required|digits:10',
            'address'=>'required',
            'adult'=>'numeric|min:1|max:10',
            'chidren'=>'numeric|min:0|max:10',
            'infant'=>'numeric|min:0|max:10',
            'start_time'=>'required|after:today',
            'bank_card_name'=>'required',
            'bank_card_number'=>'required|numeric',
            'bank_card_month'=>'required|min:1|max:12',
            'bank_card_year'=>'required|numeric',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Name can not null',
            'adult.numeric'=>'Adult must be number',
            'adult.numeric'=>'Adult lestest than 1 ',
            'adult.numeric'=>'Adult longest than 10 ',
            'children.numeric'=>'Children must be number',
            'infant.numeric'=>'Infant must be number',
            'children.numeric'=>'Children lestest than 0 ',
            'infant.numeric'=>'Infant lestest than 0 ',
            'children.numeric'=>'Children longest than 10 ',
            'infant.numeric'=>'Infant longest than 10 ',
            'id_card.required'=>'Id card can not null',
            'email.required'=>'Email can not null',
            'phone.required'=>'Phone can not null',
            'address.required'=>'Address can not null',
            'start_time.required'=>'Start time can not null',
            'start_time.after'=>'Start time must after today',
            'bank_card_name.required'=>'Bank card name can not null',
            'bank_card_number.required'=>'Bank card number can not null',
            'bank_card_month.required'=>'Bank card month can not null',
            'bank_card_year.required'=>'Bank card year can not null',
        ];
    }
}
