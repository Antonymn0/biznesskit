<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'access_code',
        'work_email',
        'work_phone',
        'mpesa_no',
        'bank',
        'bank_branch',
        'bank_code',
        'bank_acc_no',
        'payment_mode',
        'basic_salary',
        'house_allowance',
        'transport_allowance',
        'other_allowances',
        'overtime_amount',
        'paye_amount',
        'helb_amount',
        'loan_amount',
        'nhif_amount',
        'nssf_amount',
        'net_pay',
        'height',
        'status',
        'kra_pin',
        'nhif_no',
        'nssf_no',
        'job_id',
        'employement_date',
        'termination_date',
        'approved_by',
        'supervisor_id',
        'registered_by',
        'suspended_at',
        'suspended_by',
        'deleted_at'
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
