<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code');
            $table->enum('type', ['promo', 'external'])->nullable();
            $table->enum('rate', ['flat', 'percent'])->nullable();
            $table->string('value')->nullable();
            $table->string('max_usage')->nullable();
            $table->dateTime('valid_from');
            $table->dateTime('valid_till');
            $table->decimal('min_order_amount')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
