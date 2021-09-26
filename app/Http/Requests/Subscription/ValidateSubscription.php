<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSubscription extends FormRequest
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
            'subscriber_id' => ['required', 'integer'],
            'status' => ['required', 'integer'],
            'payment_type' => ['string'],
            'currency' => [ 'string'],
            'total_due' => [ 'required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'mpesa_phone' => [ 'string'],
            'payment_due_date' => [ 'date'],
            'interest_rate' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'account_ref' => [ 'string'],
            'transaction_desc' => [ 'string'],
            'merchant_request_id' => [ 'string'],
            'checkout_request_id' => [ 'string'],
            'response_code' => [ 'string'],
            'response_msg' => [ 'string'],
            'card_no' => [ 'string'],
            'card_type' => [ 'string'],
            'card_month' => [ 'string'],
            'comments' => [ 'string'],
            'start_date' => [ 'date'],
            'end_date' => [ 'date'],
            'deleted_at' => [ 'date'],
            'suspended_at' => [ 'date'],
        ];
    }
}
