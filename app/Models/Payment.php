<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'method',
        'status',
        'currency',
        'total_due',
        'payment_due_date',
        'interest_rate',
        'account_ref',
        'transaction_desc',
        'merchant_request_id',
        'checkout_request_id',
        'response_code',
        'response_msg',
        'cheque_no',
        'cheque_bank_name',
        'cheque_bank_branch',
        'card_no',
        'card_type',
        'card_month',
        'card_year',
        'card_csv',
        'comments',
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
