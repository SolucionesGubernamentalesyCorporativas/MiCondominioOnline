<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_transactions', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->text('name');
            $table->boolean('income_outcome')->default(0);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('type_of_transactions');
    }
}
