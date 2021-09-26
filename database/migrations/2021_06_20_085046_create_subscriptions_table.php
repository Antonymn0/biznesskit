<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subscriber_id')->required()->index();
            $table->tinyInteger('status')->required();
            $table->string('payment_type')->nullable();
            $table->string('currency')->required();
            $table->double('total_due')->required();
            $table->string('mpesa_phone')->nullable();
            $table->timestamp('payment_due_date')->required();
            $table->double('interest_rate')->required();
            $table->string('account_ref')->nullable();
            $table->string('transaction_desc')->nullable();
            $table->string('merchant_request_id')->nullable();
            $table->string('checkout_request_id')->nullable();
            $table->string('response_code')->nullable();
            $table->string('response_msg')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_month')->nullable();
            $table->string('comments')->nullable();
            $table->dateTime('start_date')->required();
            $table->dateTime('end_date')->required();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('suspended_at')->nullable();

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
        Schema::dropIfExists('subscriptions');
    }
}
