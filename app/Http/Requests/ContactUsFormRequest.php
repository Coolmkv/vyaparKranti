<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactUsFormRequest extends FormRequest
{
    use ResponseAPI;
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
            "name"=>"required|string",
            "emailId"=>"required|email",
            "contact_number"=>"nullable|numeric|digits_between:10,15",
            "message"=>"required|string",
            "captcha"=>"required|captcha",
        ];
    }
    public function messages()
    {
        return [
            "emailId.required" => "Email id is required.",
            "captcha.required" => "Captcha is required.",
            "captcha.captcha" => "Invalid captcha text."
        ];
    }

    /**
     * Get the error messages for the defined validation rules.*
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->getMessageBag()->first(), 200));
    }
}
