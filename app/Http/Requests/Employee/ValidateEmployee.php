<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class ValidateEmployee extends FormRequest
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
            'access_code' => [ 'integer'],
            'work_email' => [ 'string' ],
            'work_phone' => ['string' ],
            'mpesa_no' => ['string' ],
            'bank' => [ 'string'],
            'bank_branch' => [ 'string'],
            'bank_code' => ['string' ],
            'bank_acc_no' => [ 'string'],
            'payment_mode' => [ 'string'],
            'basic_salary' => ['regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'house_allowance' => ['regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'transport_allowance' => ['regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'other_allowances' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'overtime_amount' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'paye_amount' => ['regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'helb_amount' => ['regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'loan_amount' => ['regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'nhif_amount' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'nssf_amount' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'net_pay' => ['regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'height' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'status' => [ 'integer'],
            'kra_pin' => ['string' ],
            'nhif_no' => [ 'string'],
            'nssf_no' => [ 'string'],
            'job_id' => [ 'string'],
            'employement_date' => ['date' ],
            'termination_date' => ['date' ],
            'approved_by' => ['integer' ],
            'supervisor_id' => ['integer' ],
            'registered_by' => [ 'integer'],
            'suspended_at' => [ 'date'],
            'suspended_by' => ['integer' ],
            'deleted_at' => [ 'date']
        ];
    }
}
