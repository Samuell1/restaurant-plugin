<?php namespace Samuell\Restaurant\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateOffersTable extends Migration
{

    public function up()
    {
        Schema::create('samuell_restaurant_offers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');
            $table->string('color')->nullable();

            $table->integer('parent_id')->nullable();
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('nest_depth')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuell_restaurant_offers');
    }

}
