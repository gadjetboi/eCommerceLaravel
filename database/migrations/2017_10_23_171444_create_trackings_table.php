<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('trackings')) {
            Schema::create('trackings', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();

                $table->string('company');
                $table->string('trackingNumber');
                $table->string('status')->nullable();
                $table->datetime('estimatedDelivery')->nullable();
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
        Schema::dropIfExists('trackings');
    }
}
