<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('membership_id');
            $table->unsignedBigInteger('role_id');
            $table->text('name');
            $table->text('lastname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('membership_id')
            ->references('id')
            ->on('memberships')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
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
        Schema::dropIfExists('users');
    }
}
