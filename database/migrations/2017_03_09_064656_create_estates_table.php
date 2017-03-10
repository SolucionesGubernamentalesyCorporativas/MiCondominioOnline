<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_of_estate_id');
            $table->foreign('type_of_estate_id')->references('id')->on('type_of_estates');
            $table->text('number');
            $table->boolean('rented');
            $table->integer('number_of_parking_lots');
            $table->text('notes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estates');
    }
}
