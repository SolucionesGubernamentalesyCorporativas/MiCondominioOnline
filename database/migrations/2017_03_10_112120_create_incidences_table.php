<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_of_incidence_id')->nullable();
            $table->unsignedBigInteger('estate_id')->nullable();
            $table->date('date');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_of_incidence_id')
            ->references('id')
            ->on('type_of_incidences')
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
        Schema::dropIfExists('incidences');
    }
}
