<?php

namespace App\Http\Requests\Subscriber;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubscriber extends FormRequest
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
            'full_name'=>['required','max:255'],
            'first_name'=>['string','max:255'],
            'middle_name'=>['string','max:255'],
            'last_name'=>['string','max:255'],
            'user_name'=>['string','max:255',  Rule::unique('subscribers')->ignore($this->subscriber) ],
            'email'=>['required', 'string','max:255', 'email', Rule::unique('subscribers')->ignore($this->subscriber)],
            'phone'=>['required', 'string', Rule::unique('subscribers')->ignore($this->subscriber)],
            'address'=>['string','max:255'],
            'biography'=>['string', 'max:255'],
            'password' => ['required','min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/','max:255'],
            'password_again' => ['same:password'],            
            'id_number'=> [ 'integer', Rule::unique('subscribers')->ignore($this->subscriber)],
            'passport_no'=> [ 'string', 'max:255', Rule::unique('subscribers')->ignore($this->subscriber)],
            'dob'=> ['date'],
            'city'=> ['string', 'max:255'],
            'postal_code'=> ['string', 'max:255'],
            'physical_address'=> ['string', 'max:255'],
            'phone_verified_at'=> ['date'],
            'email_verified_at'=> ['date'],
            'id_verified_at'=> ['date'],
            'gender'=> ['integer'],
            'marital_status'=> ['integer'],
            'nationality'=> ['string', 'max:255'],
            'suspended_at'=> ['date'],
            'deleted_at'=> ['date'],

        ];
    }
}
