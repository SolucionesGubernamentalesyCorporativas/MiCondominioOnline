<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondoEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condo_estate', function(Blueprint $table) {
            $table->unsignedBigInteger('condo_id')->nullable();
            $table->unsignedBigInteger('estate_id')->nullable();

            $table->foreign('condo_id')
            ->references('id')
            ->on('condos')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('estate_id')
            ->references('id')
            ->on('estates')
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
        Schema::dropIfExists('condo_estate');
    }
}
