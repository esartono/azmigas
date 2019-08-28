<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->date('date');
            $table->boolean('is_sale')->default(false);
            $table->integer('total')->unsigned();
            $table->string('note')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');
                
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('customer_transactions');
    }
}
