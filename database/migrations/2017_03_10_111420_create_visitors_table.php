<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_of_visitor_id')->nullable();
            $table->unsignedBigInteger('estate_id')->nullable();
            $table->text('name');
            $table->date('date_arrival');
            $table->boolean('vehicle')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_of_visitor_id')
            ->references('id')
            ->on('type_of_visitors')
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
        Schema::dropIfExists('visitors');
    }
}
