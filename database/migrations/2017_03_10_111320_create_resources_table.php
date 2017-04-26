<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_of_resource_id')->nullable();
            $table->unsignedBigInteger('estate_id')->nullable();
            $table->integer('capacity');
            $table->float('fee');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_of_resource_id')
            ->references('id')
            ->on('type_of_resources')
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
        Schema::dropIfExists('resources');
    }
}
