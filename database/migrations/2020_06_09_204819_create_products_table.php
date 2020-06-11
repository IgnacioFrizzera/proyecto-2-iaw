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
            $table->string('name', 255);
            $table->string('product_code', 10)->primary();
            $table->string('description', 100)->nullable();
            $table->float('price', 8, 2);
            $table->mediumText('image_one')->nullable();
            $table->mediumText('image_two')->nullable();
            $table->mediumText('image_three')->nullable();
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