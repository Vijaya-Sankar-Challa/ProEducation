<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->biginteger('phone_number')->unique();
            $table->integer('role')->default('0');  
            $table->boolean('verified')->default(false);
            $table->string('intro')->default('An intro about you.');
            $table->string('avatar')->default('default.jpg');
            $table->string('password');
            $table->ipAddress('visitor')->default('255.255.255.0');
            $table->macAddress('device')->default('00:00:00:00:00:00');   
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
