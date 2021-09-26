<?php

namespace App\Http\Requests\Tax;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTax extends FormRequest
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
            'name' => ['required', 'string'],
            'initials' => ['required', 'string'],
            'type' => ['required', 'string'],
            'rate' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'amount' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'description' => [ 'string'],
            'deleted_at' => [ 'date'],
            'suspended_at' => [ 'date'],
        ];
    }
}
