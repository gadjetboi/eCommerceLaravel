<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('address');
                $table->string('city');
                $table->string('state');
                $table->string('country');
                $table->string('postalCode');

                $table->integer('user_id')->unsigned();
                
                $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('addresses');
    }
}
