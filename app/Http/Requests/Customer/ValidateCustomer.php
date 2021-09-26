<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCustomer extends FormRequest
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
            'user_id' => [ 'required', 'integer'],
            'loyalty_points' => ['integer' ],
            'sms_notification' => [ 'integer'],
            'newsletter_subscription' => ['integer' ],
            'payment_mode' => ['integer' ],
            'mpesa_no' => [ 'integer'],
            'card_no' => ['string' ],
            'card_type' => [ 'string'],
            'card_month' => ['string' ],
            'card_year' => [ 'string'],
            'card_csv' => [ 'string'],
            'approved_by' => ['integer' ],
            'relationship_mngr_id' => ['integer' ],
            'registered_by' => ['integer' ],
            'suspended_by' => ['integer' ],
            'deleted_at' => [ 'date']
        ];
    }
}
