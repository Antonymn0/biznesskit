<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('user_name')->nullable()->unique();           
            $table->string('email')->unique()->required();
            $table->string('phone')->nullable();  
            $table->string('address')->nullable();
            $table->string('biography')->nullable();
            $table->string('password')->required(); 
            $table->integer('id_number')->nullable()->unique(); 
            $table->string('passport_no')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('physical_address')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('id_verified_at')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('marital_status')->nullable();
            $table->string('nationality')->nullable();
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
        Schema::dropIfExists('subscribers');
    }
}
