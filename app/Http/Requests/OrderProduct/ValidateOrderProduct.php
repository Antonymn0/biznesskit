<?php

namespace App\Http\Requests\OrderProduct;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderProduct extends FormRequest
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
            'order_id' => [ 'required', 'integer'],
            'product_id' => [ 'required', 'integer'],
            'name' => [ 'required', 'string'],
            'unit_price' => [ 'required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'total_amount' => [ 'required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'payable_amount' => [ 'required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'vat_amount' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'quantity' => [ 'required', 'integer'],
            'suspended_at' => [ 'date'],
            'deleted_at' => [ 'date']
        ];
    }
}
