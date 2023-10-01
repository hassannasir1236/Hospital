<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('doctor_phone');
            $table->string('doctor_speciality');
            $table->string('doctor_room');
            $table->string('image');
            $table->string('new_image_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_doctors');
    }
};
