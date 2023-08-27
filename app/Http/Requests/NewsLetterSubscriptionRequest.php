<?php

namespace App\Http\Requests;

use App\Models\NewsLetter;
use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class NewsLetterSubscriptionRequest extends FormRequest
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
            'email' => "required|email|unique:" . NewsLetter::TABLE_NAME . "," . NewsLetter::EMAIL_ID,
            'captcha_text' => "required|captcha"
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email id is required.",
            "exists.required" => "Email id is aready subscribed.",
            "captcha_text.required" => "Captcha is required.",
            "captcha_text.captcha" => "Invalid captcha text."
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
