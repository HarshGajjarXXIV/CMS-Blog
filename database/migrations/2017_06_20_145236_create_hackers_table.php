<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hackers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user', 20)->unique();
            $table->string('email', 150)->unique();
            $table->string('profile_pic')->default('default.jpg')->nullable(true);
            $table->string('name');
            $table->string('password');
            $table->string('level');
            $table->text('about')->nullable(true);
            $table->string('twitter')->nullable(true);
            $table->string('fb')->nullable(true);
            $table->string('insta')->nullable(true);
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
        Schema::dropIfExists('hackers');
    }
}
