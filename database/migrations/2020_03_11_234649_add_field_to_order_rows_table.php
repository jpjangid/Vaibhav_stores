<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToOrderRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_rows', function (Blueprint $table) {
            $table->decimal('gst_rate')->nullable();
            $table->decimal('taxable_amount')->nullable();
            $table->decimal('cgst')->nullable();
            $table->decimal('sgst')->nullable();
            $table->decimal('igst')->nullable();
            $table->decimal('round_of')->nullable();
            $table->decimal('total_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_rows', function (Blueprint $table) {
            //
        });
    }
}
