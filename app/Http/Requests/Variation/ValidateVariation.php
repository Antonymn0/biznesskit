<?php

namespace App\Http\Requests\Variation;

use Illuminate\Foundation\Http\FormRequest;

class ValidateVariation extends FormRequest
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
            'product_id' => ['required', 'integer'],
            'meta' => ['required', 'string'],
            'meta_val' => ['required', 'string'],
            'units' => [ 'string'],
            'description' => [ 'string'],
            'deleted_at' => [ 'date'],
            'suspended_at' => [ 'date']
        ];
    }
}
