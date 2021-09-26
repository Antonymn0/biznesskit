<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSetting extends FormRequest
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
            'created_by' => ['required', 'integer' ],
            'status' => [ 'required', 'integer'],
            'category' => [ 'required', 'string'],
            'meta_name' => [ 'required', 'string' ],
            'meta_val' => ['required', 'string' ],
            'suspended_at' => ['date' ],
            'deleted_at' => ['date' ]
        ];
    }
}
