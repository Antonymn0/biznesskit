<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->required()->index();            
            $table->Integer('loyalty_points')->nullable();
            $table->Integer('sms_notification')->nullable();
            $table->Integer('newsletter_subscription')->nullable();
            $table->integer('payment_mode')->nullable();
            $table->integer('mpesa_no')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_month')->nullable();
            $table->string('card_year')->nullable();
            $table->string('card_csv')->nullable();
            $table->integer('approved_by')->nullable()->index();
            $table->integer('relationship_mngr_id')->nullable()->index();
            $table->integer('registered_by')->nullable()->index();
            $table->integer('suspended_by')->nullable()->index();
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
        Schema::dropIfExists('customers');
    }
}
