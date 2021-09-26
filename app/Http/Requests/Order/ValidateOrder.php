<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrder extends FormRequest
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
            'customer_id' => ['required', 'integer' ],
            'cashier_id' => ['required', 'integer' ],
            'reference' => [ 'string' ],
            'status' => [ 'string'  ],
            'type' => ['string' ],
            'amount_due' => [  'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'discount_rate' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'discount_amount' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'description' => ['string' ],
            'shipping_cost' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'suspended_at' => [ 'date'],
            'deleted_at' => ['date' ]
        ];
    }
}
