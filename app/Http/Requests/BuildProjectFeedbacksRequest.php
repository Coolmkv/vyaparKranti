<?php

namespace App\Http\Requests;

use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BuildProjectFeedbacksRequest extends FormRequest
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
            "name"=>"required|string|max:100",
            "company"=>"required|string|max:255",
            "email"=>"required|email|max:100",
            "phone_number"=>"required|integer|digits_between:10,10",
            "description"=>"required|string",
            "selected_options"=>"required|array",
            "captcha"=>"required|captcha"
        ];
    }

    public function messages()
    {
        return [
            "selected_options.required"=>"Please select some requirement options.",
            "phone_number.digits_between"=>"Phone number should be 10 digits number."
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
