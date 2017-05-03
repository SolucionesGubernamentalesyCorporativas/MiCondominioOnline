<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('estate_id')->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable();

            $table->foreign('estate_id')
            ->references('id')
            ->on('estates')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('transaction_id')
            ->references('id')
            ->on('transactions')
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
        Schema::dropIfExists('estate_transaction');
    }
}
