<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'first_name',
        'middle_name',
        'last_name',
        'user_name',
        'email',
        'phone',
        'address',
        'password',
        'biography',
        'id_number',
        'passport_no',
        'dob',
        'city',
        'postal_code',
        'physical_address',
        'phone_verified_at',
        'email_verified_at',
        'id_verified_at',
        'gender',
        'marital_status',
        'nationality', 
        'suspended_at',      
        'deleted_at',
       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
       //
    ];
}
