<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('sku');
                $table->string('name')->nullable();
                $table->text('description')->nullable();
                $table->integer('quantity')->nullable();
                $table->decimal('price',5,2)->nullable();

                //to enable to support json upgrade mysql to version 5.7. Reference: https://gist.github.com/pedro-santiago/0d23167e50f95489103507725bb0fb14
                $table->json('images')->nullable(); 
                $table->boolean('isFeatured')->nullable();
                $table->boolean('isRecommended')->nullable();

                $table->integer('brand_id')->unsigned();
                $table->integer('brand_category_id')->unsigned();
                
                $table->foreign('brand_id')->references('id')->on('brands');
                $table->foreign('brand_category_id')->references('id')->on('brands_categories');
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
        Schema::dropIfExists('products');
    }
}
