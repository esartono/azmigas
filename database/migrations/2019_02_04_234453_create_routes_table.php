<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('vehicle_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->json('route_out');
            $table->json('route_in');
            $table->string('note')->nullable();
            $table->integer('charge')->unsigned()->default(0);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('vehicle_id')
                ->references('id')->on('vehicles')
                ->onDelete('cascade');

            $table->foreign('driver_id')
                ->references('id')->on('drivers')
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
        Schema::dropIfExists('routes');
    }
}
