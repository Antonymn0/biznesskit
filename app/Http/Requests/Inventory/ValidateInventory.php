<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class ValidateInventory extends FormRequest
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
            'product_id' => ['required', 'integer'  ],
            'created_by' => ['required', 'integer'  ],
            'new_quantity' => [ 'required', 'integer' ],
            'available_quantity' => ['required', 'integer'  ],
            'units' => [   ],
            'reason' => [  'string' ],
            'description' => ['string' ],
            'suspended_at' => ['date' ],
            'deleted_at' => [ 'date']
        ];
    }
}
