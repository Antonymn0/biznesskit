<?php

namespace App\Http\Requests\ReportProduct;

use Illuminate\Foundation\Http\FormRequest;

class ValidateReportProduct extends FormRequest
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
            'report_id' => ['required', 'integer' ],
            'product_id' => ['required', 'integer' ],
            'name' => ['required' ,'string'],
            'payable_amount' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'  ],
            'vat_amount' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'quantity' => ['required', 'regex:/^[0-9]+(\.[0-9]{1,2})?$/' ],
            'suspended_at' => ['date' ],
            'deleted_at' => ['date' ]
        ];
    }
}
