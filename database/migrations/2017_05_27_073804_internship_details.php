<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternshipDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('internship_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('internship_category_id')->unsigned();
            $table->text('title');
            $table->string('powered_by');
            $table->text('introduction');
            $table->text('location');
            $table->text('dates');
            $table->text('venue');
            $table->text('contact_numbers');
            $table->string('accommodation_fee');
            $table->text('highlights');
            $table->text('who_can_attend');
            $table->mediumtext('payment_procedure');
            $table->timestamps();
        });

        Schema::table('internship_details', function ($table)
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
        Schema::dropIfExists('internship_details');
    }
}
