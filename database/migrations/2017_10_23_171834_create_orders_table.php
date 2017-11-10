<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('orderNo')->nullable();
                $table->integer('quantity')->nullable();
                $table->decimal('totalAmount',5,2)->nullable();

                $table->integer('address_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('tracking_id')->unsigned();
                $table->integer('payment_id')->unsigned();

                $table->foreign('address_id')->references('id')->on('addresses');
                $table->foreign('user_id')->references('id')->on('users');   
                $table->foreign('tracking_id')->references('id')->on('trackings');   
                $table->foreign('payment_id')->references('id')->on('payments');            
            });
        }
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
