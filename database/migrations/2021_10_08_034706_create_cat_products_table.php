<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_cat_title',200);
            $table->string('product_url_cat_title',200);
            $table->string('product_cat_id',200);
            $table->string('url_update',200)->nullable();
            $table->string('url_delete',200)->nullable();
            $table->string('url',200)->nullable();
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
        Schema::dropIfExists('cat_products');
    }
}
