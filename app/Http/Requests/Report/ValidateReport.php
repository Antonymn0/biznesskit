<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class ValidateReport extends FormRequest
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
             'employee_id' => ['required', 'integer' ],
             'title' => ['required', 'string' ],
             'summary' => [ 'string' ],
             'type' => ['required', 'string' ],
             'terms' => [ 'string' ],
             'description' => [ 'string' ],
             'deleted_at' => [ 'date' ],
             'suspended_at' => [ 'date' ]
        ];
    }
}
