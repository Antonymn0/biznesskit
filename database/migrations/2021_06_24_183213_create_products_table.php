<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable()->index();
            $table->string('name')->required();
            $table->string('slug')->unique()->required();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('sku')->nullable()->unique();
            $table->double('regular_price')->required();
            $table->text('description')->nullable();
            $table->text('summary')->nullable();
            $table->double('sale_price')->nullable();
            $table->text('purchase_note')->nullable();
            $table->string('sell_button_text')->nullable();
            $table->text('tags')->nullable();
            $table->tinyInteger('downloadable')->nullable();
            $table->dateTime('sale_start_date')->nullable();
            $table->dateTime('sale_end_date')->nullable();
            $table->dateTime('publish_at')->nullable();
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
        Schema::dropIfExists('products');
    }
}
