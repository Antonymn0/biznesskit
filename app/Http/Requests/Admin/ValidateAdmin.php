<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdmin extends FormRequest
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
            'user_id' => ['required', 'integer' ],
            'work_email' => ['email', 'unique:admins' ],
            'work_phone' => ['string' ],
            'sms_notifications' => [ 'integer'],
            'email_notifications' => ['integer' ],
            'new_sale_alert' => ['integer' ],
            'new_customer_alert' => ['integer' ],
            'daily_sales_alert' => ['integer' ],
            'customers_report' => [ 'integer'],
            'employees_report' => [ 'integer'],
            'inventory_report' => ['integer' ],
            'recieve_stock_alert' => [ 'integer'],
            'min_stock_alert' => [ 'integer'],
            'employement_date' => ['date' ],
            'termination_date' => [ 'date'],
            'approved_by' => [ 'integer'],
            'registered_by' => ['integer' ],
            'suspended_by' => [ 'integer'],
            'suspended_at' => [ 'date'],
            'deleted_at' => ['date' ]
        ];
    }
}
