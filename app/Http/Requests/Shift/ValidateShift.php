<?php

namespace App\Http\Requests\Shift;

use Illuminate\Foundation\Http\FormRequest;

class ValidateShift extends FormRequest
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
            'employee_id' => ['required', 'integer'],
            'approved_by' => [  'integer'],
            'start_date' => [ 'date'],
            'end_date' => [ 'date'],
            'type' => [ 'string'],
            'rate_per_hour' => [  'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'total_hours' => [  'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'description' => [  'string'],
            'suspended_at' => [ 'date'],
            'deleted_at' => [ 'date']
        ];
    }
}
