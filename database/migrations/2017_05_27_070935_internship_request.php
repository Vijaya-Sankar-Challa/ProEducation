<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternshipRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('collage');
            $table->string('email');
            $table->biginteger('phone_number');
            $table->integer('year');
            $table->integer('internship_category_id')->unsigned();
            $table->string('department');
            $table->integer('Accommodation');
            $table->timestamps();
        });

        Schema::table('internship_request', function ($table)
        {
            $table->foreign('internship_category_id')->references('id')->on('internship_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('internship_request');
    }
}
