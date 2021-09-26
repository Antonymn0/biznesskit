<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->required()->index();
            $table->bigInteger('product_id')->required()->index();
            $table->string('name')->required();
            $table->double('unit_price')->required();
            $table->double('total_amount')->required();
            $table->double('payable_amount')->required();
            $table->double('vat_amount')->nullable();
            $table->bigInteger('quantity')->required(); 
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
        Schema::dropIfExists('order_products');
    }
}
