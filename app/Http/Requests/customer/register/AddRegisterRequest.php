<?php

namespace App\Http\Requests\customer\register;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\customer\Customer;
use Illuminate\Validation\Rules\Password;

class AddRegisterRequest extends FormRequest
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
            'name'=>'required|unique:Customer',
            'email'=>'required|unique:Customer|email',
            'phone'=>'required|unique:Customer|digits:10',
            'pass' => ['required', Password::min(8)->mixedCase()],
            'cf_password' => ['required','same:pass', Password::min(8)->mixedCase()],
        ];
    }
}
