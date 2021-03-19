<?php namespace Samuell\Restaurant\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateOffersMealsTable extends Migration
{

    public function up()
    {
        Schema::create('samuell_restaurant_offers_meals', function($table)
        {
            $table->integer('offer_id')->unsigned();
            $table->integer('meal_id')->unsigned();

            $table->foreign('offer_id')->references('id')->on('samuell_restaurant_offers')->onDelete('cascade');
            $table->foreign('meal_id')->references('id')->on('samuell_restaurant_meals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuell_restaurant_offers_meals');
    }

}
