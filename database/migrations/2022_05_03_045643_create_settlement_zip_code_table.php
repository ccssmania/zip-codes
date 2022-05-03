<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementZipCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlement_zip_code', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code_id');
            $table->foreign('zip_code_id')->references('id')->on('zip_codes');
            $table->unsignedBigInteger('settlement_id');
            $table->foreign('settlement_id')->references('id')->on('settlements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlement_zip_code');
    }
}
