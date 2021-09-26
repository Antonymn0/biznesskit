<?php

namespace App\Http\Requests\Subscriber;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Subscriber;

class ValidateSubscriber extends FormRequest
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
            'full_name'=>['required','string','max:255'],
            'first_name'=>['string','max:255'],
            'middle_name'=>['string','max:255'],
            'last_name'=>['string','max:255'],
            'user_name'=>['string', 'max:255', 'unique:subscribers' ],
            'email'=>['required', 'string','max:255','email',  'unique:subscribers'],
            'phone'=>['required', 'string', 'unique:subscribers'],
            'address'=>['string','max:255'],
            'biography'=>['string', 'max:255'],
            'password' => ['required','min:6'],
            'password_again' => ['same:password'],            
            'id_number'=> [ 'integer',  'unique:subscribers'],
            'passport_no'=> [ 'string', 'max:255',  'unique:subscribers'],
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
