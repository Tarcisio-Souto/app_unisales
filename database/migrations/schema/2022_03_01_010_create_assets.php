<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('patrimony_number');
            $table->boolean('status');
            $table->unsignedBigInteger('fk_category');
            $table->unsignedBigInteger('fk_instituition');
            $table->unsignedBigInteger('fk_model');

            $table->foreign('fk_category')->references('id')->on('categories');
            $table->foreign('fk_instituition')->references('id')->on('instituitions');
            $table->foreign('fk_model')->references('id')->on('models');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
