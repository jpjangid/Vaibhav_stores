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
            $table->bigIncrements('id');
            $table->dateTime('order_date');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('order_no');
            $table->decimal('order_amount',10,2);
            $table->string('payment_mode',30);
            $table->string('payment_status',30);
            $table->string('bill_name');
            $table->string('bill_mobile');
            $table->string('bill_address');
            $table->string('bill_pincode');
            $table->string('bill_landmark');
            $table->string('bill_state');
            $table->string('ship_name');
            $table->string('ship_mobile');
            $table->string('ship_address');
            $table->string('ship_pincode');
            $table->string('ship_landmark');
            $table->string('ship_state');
            $table->string('razorpay_order_id')->nullable();
            $table->string('razorpay_payment_id')->nullable();
            $table->string('razorpay_signature')->nullable();
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
