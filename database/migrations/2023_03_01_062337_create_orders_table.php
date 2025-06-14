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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('api_order_id')->nullable();
            $table->decimal('sub_total');
            $table->float('discount_amount')->nullable();
            $table->decimal('total_amount');
            $table->enum('status', ['initial', 'completed', 'failed']);
            $table->foreignId('user_address_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->longText('street_address')->nullable();
            $table->longText('landmark')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
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
