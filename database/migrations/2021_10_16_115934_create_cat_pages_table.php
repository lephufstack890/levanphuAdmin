<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_cat',200);
            $table->string('page_slug',200);
            $table->string('url',200)->nullable();
            $table->string('url_update',200)->nullable();
            $table->string('url_delete',200)->nullable();
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
        Schema::dropIfExists('cat_pages');
    }
}
