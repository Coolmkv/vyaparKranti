<?php

namespace App\Http\Requests;

use App\Models\CategoryItems;
use App\Models\LibraryCategories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LibraryCategoryItemsRequest extends FormRequest
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
            CategoryItems::ID=>"required_if:action,update,enable,delete|nullable|exists:".CategoryItems::TABLE_NAME.",".CategoryItems::ID,
            CategoryItems::LIBRARY_CATEGORY_ID=>"required_if:action,insert,update|exists:".LibraryCategories::TABLE_NAME.",".LibraryCategories::ID,
            CategoryItems::ITEM_TITLE=>"nullable|string|max:255",
            CategoryItems::ITEM_DETAILS=>"nullable|string",
            "action"=>"nullable|in:insert,update,delete,enable",
            CategoryItems::ITEM_IMAGE=>"required_if:action,insert|image|max:1024",
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
