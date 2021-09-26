<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->required()->index(); 
            $table->string('work_email')->nullable(); 
            $table->string('work_phone')->nullable(); 
            $table->tinyInteger('sms_notifications')->nullable(); 
            $table->tinyInteger('email_notifications')->nullable(); 
            $table->tinyInteger('new_sale_alert')->nullable(); 
            $table->tinyInteger('new_customer_alert')->nullable(); 
            $table->tinyInteger('daily_sales_alert')->nullable(); 
            $table->tinyInteger('customers_report')->nullable(); 
            $table->tinyInteger('employees_report')->nullable(); 
            $table->tinyInteger('inventory_report')->nullable(); 
            $table->tinyInteger('recieve_stock_alert')->nullable(); 
            $table->tinyInteger('min_stock_alert')->nullable(); 
            $table->dateTime('employement_date')->nullable(); 
            $table->dateTime('termination_date')->nullable(); 
            $table->integer('approved_by')->nullable()->index(); 
            $table->integer('registered_by')->nullable()->index(); 
            $table->integer('suspended_by')->nullable()->index(); 
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
        Schema::dropIfExists('admins');
    }
}
