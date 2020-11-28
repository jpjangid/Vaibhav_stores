<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCloseToEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->longText('closed_reason')->nullable();
            $table->date('closed_at')->nullable();
            $table->bigInteger('closed_by')->unsigned()->nullable();
            $table->foreign('closed_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropColumn('closed_reason');
            $table->dropColumn('closed_at');
            $table->dropColumn('closed_by');
        });
    }
}
