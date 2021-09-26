<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
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
            'user_name'=>['string', 'max:255', 'unique:users' ],
            'email'=>['required', 'email',  'unique:users'],
            'phone'=>['required', 'string', 'unique:users'],
            'address'=>['string','max:255'],
            'biography'=>['string', 'max:255'],
            'password' => ['required','min:6'],
            'password_again' => ['same:password'],            
            'id_number'=> [ 'integer',  'unique:users'],
            'passport_no'=> [ 'string', 'max:255',  'unique:users'],
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

            'name' => ['string'],
            // 'profile_photo_path' => ['image|max:2048|mimes:jpg,bmp,png'],
                ];
    }
}
