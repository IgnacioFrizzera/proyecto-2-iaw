<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->string('product_code', 10)->primary();
            $table->foreign('product_code')->references('code')->on('products')->onDelete('cascade');
            $table->integer('s_stock')->unsigned()->default(0);
            $table->integer('m_stock')->unsigned()->default(0);
            $table->integer('l_stock')->unsigned()->default(0);
            $table->integer('xl_stock')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stock');
    }
}
