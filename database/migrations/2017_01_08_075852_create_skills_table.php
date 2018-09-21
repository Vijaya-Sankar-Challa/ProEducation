<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('skills_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('skills', function($table) {
            $table->foreign('skills_id')->references('id')->on('skills_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('skills');
    }
}
