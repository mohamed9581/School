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
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->json('name_Father')->nullable();
            $table->string('passeport_ID_Father');
            $table->string('cin_Father');
            $table->string('phone_Father');
            $table->json('job_Father')->nullable();
            $table->bigInteger('nationality_Father_id')->unsigned();
            $table->bigInteger('blood_Father_id')->unsigned();
            $table->bigInteger('religion_Father_id')->unsigned();
            $table->string('addresse_Father');

            //Mother information
            $table->json('name_Mother')->nullable();
            $table->string('passeport_ID_Mother');
            $table->string('cin_Mother');
            $table->string('phone_Mother');
            $table->json('job_Mother')->nullable();
            $table->bigInteger('nationality_Mother_id')->unsigned();
            $table->bigInteger('blood_Mother_id')->unsigned();
            $table->bigInteger('religion_Mother_id')->unsigned();
            $table->string('addresse_Mother');
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
        Schema::dropIfExists('my_parents');
    }
};
