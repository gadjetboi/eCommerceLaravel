<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('carts')) {
            Schema::create('carts', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('status')->nullable();
                $table->integer('quantity')->nullable();
                $table->decimal('totalAmount', 5, 2)->nullable();

                $table->integer('product_id')->unsigned();
                $table->integer('user_id')->unsigned();

                $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('carts');
    }
}
