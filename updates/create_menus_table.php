<?php namespace Samuell\Restaurant\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateMenusTable extends Migration
{

    public function up()
    {
        Schema::create('samuell_restaurant_menus', function($table)
        {
            $table->engine = 'InnoDB';
            $table->timestamp('date');

            $table->string('name')->nullable();
            $table->string('soup')->nullable();
            $table->json('menu');

            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuell_restaurant_menus');
    }

}
