<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('vehicle_type_id')->unsigned();
            $table->string('plate');
            $table->date('tax');
            $table->date('kir')->nullable();
            $table->date('stnk_expired');
            $table->timestamps();

            $table->foreign('vehicle_type_id')
                ->references('id')->on('vehicle_types')
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
        Schema::dropIfExists('vehicles');
    }
}
