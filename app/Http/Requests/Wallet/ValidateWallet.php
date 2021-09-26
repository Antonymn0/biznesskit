<?php

namespace App\Http\Requests\Wallet;

use Illuminate\Foundation\Http\FormRequest;

class ValidateWallet extends FormRequest
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
            'subscriber_id' => ['integer'],
            'available_bal' => ['required' , 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'currency' => ['required', 'string'],
            'status' => ['required', 'integer'],
            'deleted_at' => ['date']
        ];
    }
}
