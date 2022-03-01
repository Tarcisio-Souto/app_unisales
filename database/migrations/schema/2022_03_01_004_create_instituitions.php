<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('fantasy_name');
            $table->string('social_name');
            $table->string('cnpj');
            $table->string('email');
            $table->string('phone_number');
            $table->boolean('status');
            $table->unsignedBigInteger('fk_address');

            $table->foreign('fk_address')->references('id')->on('addresses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituitions');
    }
}
