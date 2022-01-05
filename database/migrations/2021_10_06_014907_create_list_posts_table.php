<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_title',200);
            $table->string('post_thumb',200);
            $table->string('post_cat',200);
            $table->string('post_content',200);
            $table->string('post_id',200);
            $table->string('post_status',200)->nullable();
            $table->string('post_url_title',200)->nullable();
            $table->string('post_url',200)->nullable();
            $table->string('post_url_update',200)->nullable();
            $table->string('post_url_delete',200)->nullable();
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
        Schema::dropIfExists('list_posts');
    }
}
