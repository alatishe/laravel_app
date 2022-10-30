<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option_name');
            $table->string('upper_weight');
            $table->string('lower_weight');
            $table->string('upper_height');
            $table->string('lower_height');
            $table->string('upper_width');
            $table->string('lower_width');
            $table->string('price');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
