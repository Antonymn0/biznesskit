<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->required()->index();
            $table->Integer('access_code')->nullable();
            $table->string('work_email')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('mpesa_no')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('payment_mode')->nullable();
            $table->double('basic_salary')->nullable();
            $table->double('house_allowance')->nullable();
            $table->double('transport_allowance')->nullable();
            $table->double('other_allowances')->nullable();
            $table->double('overtime_amount')->nullable();
            $table->double('paye_amount')->nullable();
            $table->double('helb_amount')->nullable();
            $table->double('loan_amount')->nullable();
            $table->double('nhif_amount')->nullable();
            $table->double('nssf_amount')->nullable();
            $table->double('net_pay')->nullable();
            $table->double('height')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('nhif_no')->nullable();
            $table->string('nssf_no')->nullable();
            $table->string('job_id')->nullable();
            $table->dateTime('employement_date')->nullable();
            $table->dateTime('termination_date')->nullable();
            $table->integer('approved_by')->nullable()->index();
            $table->integer('supervisor_id')->nullable()->index();
            $table->integer('registered_by')->nullable()->index();
            $table->timestamp('suspended_at')->nullable();
            $table->tinyInteger('suspended_by')->nullable()->index();
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
        Schema::dropIfExists('employees');
    }
}
