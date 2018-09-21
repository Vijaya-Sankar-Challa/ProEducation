<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcatjobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_category_job', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('project_category_job', function($table) {
            $table->foreign('category_id')->references('id')->on('project_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_category_job');
    }
}
