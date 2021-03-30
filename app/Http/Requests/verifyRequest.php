<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class verifyRequest extends FormRequest
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
            'national_id' => 'required|digits:14|numeric'
        ];
    }
    public function messages()
    {
        return[
            'national_id.required' => 'يجب إادخال الرقم القومي الخاص بك',
            'national_id.digits' => 'يجب ان يكون الرقم القومي مكون من 14 رقم',
            'national_id.numeric' => 'يجب ان يكون الرقم القومي ارقام فقط'
        ];

    }
}
