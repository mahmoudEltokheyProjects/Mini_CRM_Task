<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesValidation extends FormRequest
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
            'name' =>'required',
            'email' =>'required|unique:companies' ,
            'pic' => 'required|mimes:pdf,jpeg,png,jpg',
        ];
    }
    // +++++++++++++++++++++++ Validation Messages +++++++++++++++++++++++
    public function messages()
    {
        return [
            'name.required' => 'برجاء إدخال اسم الشركة'     ,
            'email.required'   => 'برجاء إدخال البريد الالكتروني للشركة'      ,
            'email.unique'   => ' البريد الالكتروني مُسجل مسبقاً'     ,
            'pic.required' => 'برجاء رفع لوجو الشركة'     ,
            'pic.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ];
    }
}
