<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf');
            $table->string('registration');
            $table->string('age');
            $table->date('dt_birth');
            $table->date('dt_adm');
            $table->string('genre');
            $table->string('email');
            $table->string('phone_number');
            $table->string('path_photo')->nullable();
            $table->boolean('status');         
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('fk_instituition');
            $table->unsignedBigInteger('fk_department');
            $table->unsignedBigInteger('fk_address');
            $table->unsignedBigInteger('fk_position');
            $table->unsignedBigInteger('fk_race');

            $table->foreign('fk_instituition')->references('id')->on('instituitions');
            $table->foreign('fk_department')->references('id')->on('departments');
            $table->foreign('fk_address')->references('id')->on('addresses');
            $table->foreign('fk_position')->references('id')->on('positions');
            $table->foreign('fk_race')->references('id')->on('races');


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
