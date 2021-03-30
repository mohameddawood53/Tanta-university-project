<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class facultiesRequest extends FormRequest
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
            "name" => "required|unique:faculties"
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "يجب إدخال اسم الكلية",
            "name.unique" => "لقد تم إدخال هذه الكلية من  قبل"
        ];
    }
}
