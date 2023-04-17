<?php

namespace App\Http\Requests;

use App\Models\LibraryCategories;
use App\Traits\ResponseAPI;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LibraryCategoriesRequest extends FormRequest
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
            "category_name"=>"required_if:action,insert,update,delete|string|max:255",
            "category_icon"=>"required_if:action,insert|image|max:1024",
            "category_details"=>"nullable|string",
            "action"=>"nullable|in:insert,update,delete,enable",
            "id"=>"required_if:action,update,enable|nullable|exists:".LibraryCategories::TABLE_NAME.",".LibraryCategories::ID
        ];
    }

    /**
    * Get the error messages for the defined validation rules.*
    * @return array
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->getMessageBag()->first(),200));
    }
}
