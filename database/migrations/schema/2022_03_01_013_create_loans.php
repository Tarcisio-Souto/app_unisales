<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime('dt_loan');
            $table->datetime('dt_devolution');
            $table->boolean('status');
            $table->text('observations')->nullable();
            $table->boolean('alert');
            $table->unsignedBigInteger('fk_asset');
            $table->unsignedBigInteger('fk_user');

            $table->foreign('fk_asset')->references('id')->on('assets');
            $table->foreign('fk_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
