<?php namespace Samuell\Restaurant\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMealsTable extends Migration
{
    public function up()
    {
        Schema::create('samuell_restaurant_meals', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->boolean('is_enabled')->default(false);

            $table->string('name');
            $table->text('description');
            $table->string('netto')->nullable();
            $table->string('netto_type')->nullable();
            $table->string('price')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuell_restaurant_meals');
    }
}
