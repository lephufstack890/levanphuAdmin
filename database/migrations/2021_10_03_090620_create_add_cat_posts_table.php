<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddCatPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_cat_posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_cat_title',200);
            $table->string('post_url_title_cat',200);
            $table->unsignedBigInteger('post_cat_id');
            $table->string('url_update',200);
            $table->string('url_delete',200);
            $table->string('url',200);
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
        Schema::dropIfExists('add_cat_posts');
    }
}
