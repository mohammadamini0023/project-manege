<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('inv');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('current_miles');
            $table->engine = 'InnoDB';
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_vehicles');
    }
}
