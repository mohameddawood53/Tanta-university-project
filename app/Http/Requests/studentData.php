<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentData extends FormRequest
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
            'name' => 'required|unique:student_data',
            'email' => 'required|unique:student_data',
            'national_id' => 'required|unique:student_data|digits:14|numeric',
            'phone_num' => 'required|unique:student_data|numeric',
            'faculty' => 'required',
            'date' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال اسمك',
            'name.unique' => 'لقد تم التسجيل بهذا الاسم من قبل',
            'email.required' => 'يجب ادخال الايميل',
            'email.unique' => 'تم التسجيل بهذا الايميل من قبل',
            'national_id.required' => 'يجب إادخال الرقم القومي الخاص بك',
            'national_id.unique' => 'لقد قمت بالتسجيل من قبل',
            'national_id.digits' => 'يجب ان يكون الرقم القومي مكون من 14 رقم',
            'national_id.numeric' => 'يجب ان يكون الرقم القومي ارقام فقط',
            'phone_num.required' => 'يجب إدخال رقم التليفون',
            'phone_num.numeric' => 'يجب ان يكون رقم التليفون ارقام فقط',
            'phone_num.unique' => 'لقد تم التسجيل بهذا الرقم من قبل',
            'faculty.required' => 'يجب ادخال الكلية',
            'date.required' => 'يجب ادخال تاريخ الكشف',

        ];
    }
}
