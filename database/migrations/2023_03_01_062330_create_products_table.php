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
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('connection_no')->nullable();
            $table->TINYTEXT ('name');
            $table->TINYTEXT ('slug');
            $table->longText('short_descriptions')->nullable();
            $table->longText('descriptions')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->float('mrp');
            $table->float('final_price');
            $table->bigInteger('stock');
            $table->string('sku')->unique()->nullable();
            $table->float('rating')->nullable();
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
