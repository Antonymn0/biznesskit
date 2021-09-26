<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePayment extends FormRequest
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
            'method' => [ 'required','string'],
            'status' => ['required', 'string'],
            'currency' => [ 'required','string'],
            'total_due' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'payment_due_date' => [ 'date'],
            'interest_rate' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'account_ref' => [ 'string'],
            'transaction_desc' => [ 'string'],
            'merchant_request_id' => [ 'string'],
            'checkout_request_id' => [ 'string'],
            'response_code' => [ 'string'],
            'response_msg' => [ 'string'],
            'cheque_no' => [ 'string'],
            'cheque_bank_name' => [ 'string'],
            'cheque_bank_branch' => [ 'string'],
            'card_no' => [ 'string'],
            'card_type' => [ 'string'],
            'card_month' => [ 'string'],
            'card_year' => [ 'string'],
            'card_csv' => [ 'string'],
            'comments' => [ 'string'],
            'suspended_at' => [ 'date'],
            'deleted_at' => [ 'date']
        ];
    }
}
