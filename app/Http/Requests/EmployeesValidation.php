<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesValidation extends FormRequest
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
    // +++++++++++++++++++++++ Validation Rules +++++++++++++++++++++++
    public function rules()
    {
        return [
            'firstName' =>'required',
            'lastName'  =>'required',
            'email' =>'required|unique:companies' ,
        ];
    }
    // +++++++++++++++++++++++ Validation Messages +++++++++++++++++++++++
    public function messages()
    {
        return [
            'firstName.required' => 'برجاء إدخال الاسم الاول '       ,
            'lastName.required'  => 'برجاء إدخال الاسم الثاني '     ,
            'email.unique'       => ' البريد الالكتروني مُسجل مسبقاً' ,
        ];
    }
}

