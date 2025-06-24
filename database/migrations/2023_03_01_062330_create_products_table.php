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
            $table->tinyText('name');
            $table->tinyText('slug');
            $table->longText('short_descriptions')->nullable();
            $table->longText('descriptions')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->float('mrp');
            $table->float('final_price');
            $table->bigInteger('stock');
            $table->string('sku')->unique()->nullable();
            $table->string('unit_sale_price')->nullable();
            $table->string('rating')->nullable();
            $table->string('skin_type')->nullable();
            $table->string('material')->nullable();
            $table->longText('special_ingredients')->nullable();
            $table->longText('care_instruction')->nullable();
            $table->string('expiry')->nullable();
            $table->string('net_quantity')->nullable();
            $table->boolean('visibility')->default(1);
            $table->softDeletes();
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
