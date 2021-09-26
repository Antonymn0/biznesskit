<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateCategory extends FormRequest
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
            'name' => ['required', 'string' ],
            'slug' => ['string',Rule::unique('categories')->ignore($this->category) ],
            'description' => [ 'string'],
            'tags' => ['string' ],
            'suspended_at' => [ 'date'],
            'deleted_at' => ['date' ]
        ];
    }
}