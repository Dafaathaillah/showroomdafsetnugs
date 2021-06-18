<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name_car');
            $table->string('type_car');
            $table->string('img_car');
            $table->string('doors');
            $table->string('seats');
            $table->string('model'); //model
            $table->string('fisrt_registartion'); // fisrt_registartion
            $table->string('millage'); // millage
            $table->string('fuel'); // fuel 
            $table->string('engine_size'); // engine_size
            $table->string('power'); // power
            $table->string('color'); // color
            $table->unsignedBigInteger('vendor_id');
            //$table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('day_price');
            //$table->unsignedBigInteger('fine');
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
        Schema::dropIfExists('cars');
    }
}
