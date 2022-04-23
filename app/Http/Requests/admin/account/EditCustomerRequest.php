<?php

namespace App\Http\Requests\admin\account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class EditCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $id;

    public function __construct(Request $request)
    {
        $this->id = (integer) $request->route()->accountCustomer;
    }

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
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
        
            'status'=>'Status cant be null',
        ];
    }
}
