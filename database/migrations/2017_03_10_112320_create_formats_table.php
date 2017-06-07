<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_of_format_id');
            $table->unsignedBigInteger('condo_id');
            $table->text('name');
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_of_format_id')
            ->references('id')
            ->on('type_of_formats')
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
        Schema::dropIfExists('formats');
    }
}
