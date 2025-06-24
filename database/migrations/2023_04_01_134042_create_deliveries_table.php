<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['Pending', 'Intransit', 'Delivered', 'Returned', 'Cancelled']);
            $table->decimal('length')->nullable();
            $table->decimal('breadth')->nullable();
            $table->decimal('height')->nullable();
            $table->decimal('weight')->nullable();
            $table->string('partner_order_id')->nullable();
            $table->string('shipment_id')->nullable();
            $table->string('awb_code')->nullable();
            $table->string('courier_name')->nullable();
            $table->bigInteger('courier_company_id')->nullable();
            $table->bigInteger('partner_status_code')->nullable();
            $table->string('partner_status')->nullable();
            $table->dateTime('pickup_scheduled_date')->nullable();
            $table->string('pickup_token_number')->nullable();
            $table->string('message')->nullable();
            $table->bigInteger('pickup_status')->nullable();
            $table->dateTime('pickup_date')->nullable();
            $table->dateTime('delivered_date')->nullable();
            $table->longText('scans')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}
