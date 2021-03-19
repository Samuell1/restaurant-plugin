<?php namespace Samuell\Restaurant\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateReviewsTable extends Migration
{

    public function up()
    {
        Schema::create('samuell_restaurant_reviews', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('rate')->default(0);
            $table->string('name');
            $table->string('email')->nullable();
            $table->text('review');
            $table->boolean('is_active')->default(0);
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('samuell_restaurant_reviews');
    }

}
