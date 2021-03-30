<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reserveRequest extends FormRequest
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
            "date" => "required|unique:reservations",
            "max_number" => "required"
        ];
    }
    public function messages()
    {
        return [
            "date.required" => "يجب إدخال حقل التاريخ",
            "date.unique" => "هذا الميعاد مسجل بالفعل",
            "max_number.required" => "يجب إدخال أقصي عدد من الطلبة للتسجيل",


        ];
    }
}
