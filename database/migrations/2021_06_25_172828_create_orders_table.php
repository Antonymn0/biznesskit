<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->required()->index();
            $table->bigInteger('cashier_id')->required()->index();
            $table->string('reference')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();  // cash or credit sale
            $table->double('amount_due')->nullable();
            $table->double('discount_rate')->nullable();
            $table->double('discount_amount')->nullable();
            $table->text('description')->nullable();
            $table->double('shipping_cost')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
