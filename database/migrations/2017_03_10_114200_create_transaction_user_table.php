<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_user', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('transaction_id')
            ->references('id')
            ->on('transactions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('transaction_user');
    }
}
