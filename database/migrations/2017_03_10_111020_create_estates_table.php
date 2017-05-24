<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesTable extends Migration
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
            $table->unsignedBigInteger('type_of_estate_id')->nullable();
            $table->unsignedBigInteger('condo_id')->nullable();
            $table->text('number');
            $table->boolean('rented')->default(0);
            $table->integer('number_of_parking_lots');
            $table->text('notes');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_of_estate_id')
            ->references('id')
            ->on('type_of_estates')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('condo_id')
            ->references('id')
            ->on('condos')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
