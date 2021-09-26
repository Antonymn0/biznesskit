<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{   
    use HasRoles;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    use InteractsWithMedia;

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

        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
