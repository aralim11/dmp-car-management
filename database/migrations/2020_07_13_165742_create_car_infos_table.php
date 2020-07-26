<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('driver_id')->unique()->nullable();
            $table->string('car_id')->unique();
            $table->string('number_plate');
            $table->string('engine_number');
            $table->string('fuel_type');
            $table->string('fuel_consumption');
            $table->string('car_type');
            $table->string('site_number');
            $table->string('door_number');
            $table->double('car_weight');
            $table->date('reg_date');
            $table->date('exp_date');
            $table->dateTime('realesed_date')->nullable();
            $table->integer('status')->default(0)->comment('0=Available, 1=Car On Service, 2=Car Under Maintenance');
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
        Schema::dropIfExists('car_infos');
    }
}
