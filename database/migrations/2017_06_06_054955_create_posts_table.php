<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150)->unique();
            $table->string('urltext');
            $table->integer('category_id')->unsigned();
            $table->string('thumbnail');
            $table->longText('body');
            $table->string('posted_by');
            $table->integer('views')->default(0)->unsigned();
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
        Schema::dropIfExists('posts');

        DB::unprepared('DROP EVENT `zero_vpw_column`');
    }
}
