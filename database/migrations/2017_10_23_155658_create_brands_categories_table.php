<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('brands_categories')) {
            Schema::create('brands_categories', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
    
                $table->integer('category_id')->unsigned();
                $table->integer('brand_id')->unsigned();
                
                $table->foreign('category_id')->references('id')->on('categories');
                $table->foreign('brand_id')->references('id')->on('brands');

                //$table->primary(['profile_id', 'course_id']); TODO: need primary declaration
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
        Schema::dropIfExists('brands_categories');
    }
}
