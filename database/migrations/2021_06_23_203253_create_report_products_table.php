<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_id')->required()->index();
            $table->bigInteger('product_id')->required()->index();
            $table->string('name')->required();
            $table->double('payable_amount')->required();
            $table->double('vat_amount')->required();
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
        Schema::dropIfExists('report_products');
    }
}
