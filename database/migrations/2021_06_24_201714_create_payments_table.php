<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->required()->index(); 
            $table->string('method')->required(); 
            $table->string('status')->required(); 
            $table->string('currency')->required(); 
            $table->double('total_due')->required(); 
            $table->timestamp('payment_due_date')->nullable(); 
            $table->double('interest_rate')->nullable(); 
            $table->string('account_ref')->nullable(); 
            $table->string('transaction_desc')->nullable(); 
            $table->string('merchant_request_id')->nullable(); 
            $table->string('checkout_request_id')->nullable(); 
            $table->string('response_code')->nullable(); 
            $table->string('response_msg')->nullable(); 
            $table->string('cheque_no')->nullable(); 
            $table->string('cheque_bank_name')->nullable(); 
            $table->string('cheque_bank_branch')->nullable(); 
            $table->string('card_no')->nullable(); 
            $table->string('card_type')->nullable(); 
            $table->string('card_month')->nullable(); 
            $table->string('card_year')->nullable(); 
            $table->string('card_csv')->nullable(); 
            $table->string('comments')->nullable(); 
            $table->timestamp('suspended_at')->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
