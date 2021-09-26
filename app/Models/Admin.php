<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
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
        'work_email',
        'work_phone',
        'sms_notifications',
        'email_notifications',
        'new_sale_alert',
        'new_customer_alert',
        'daily_sales_alert',
        'customers_report',
        'employees_report',
        'inventory_report',
        'recieve_stock_alert',
        'min_stock_alert',
        'employement_date',
        'termination_date',
        'approved_by',
        'registered_by',
        'suspended_by',
        'suspended_at',
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
