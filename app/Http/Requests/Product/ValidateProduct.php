<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
            'category_id' => [ 'integer' ],
            'name' => [ 'required', 'string'],
            'slug' => [ 'string', 'unique:products' ],
            'status' => [  'string'],
            'type' => [ 'string' ],
            'sku' => [ 'string', 'unique:products' ],
            'regular_price' => [  'required','regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'description' => ['string' ],
            'summary' => ['string' ],
            'sale_price' => [ 'regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'purchase_note' => [ 'string'],
            'sell_button_text' => ['string'],
            'tags' => [ 'string'],
            'downloadable' => [ 'integer'],
            'sale_start_date' => ['date' ],
            'sale_end_date' => ['date' ],
            'publish_at' => ['date' ],
            'suspended_at' => [ 'date'],
        ];
    }
}
