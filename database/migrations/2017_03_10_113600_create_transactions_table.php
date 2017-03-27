<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_of_transaction_id')->nullable();
            $table->foreign('type_of_transaction_id')
            ->references('id')
            ->on('type_of_transactions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('receipt_id')->nullable();
            $table->foreign('receipt_id')
            ->references('id')
            ->on('receipts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->text('observations');
            $table->float('ammount');
            $table->boolean('verified')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}
