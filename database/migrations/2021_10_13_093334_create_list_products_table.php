<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_lastname',200);
            $table->string('product_fullname',200);
            $table->string('product_code',200);
            $table->integer('product_newprice');
            $table->integer('product_oldprice');
            $table->text('product_desc');
            $table->string('product_id',200);
            $table->string('product_avatar',200);
            $table->string('images',200);
            $table->string('material_id',200);
            $table->string('color_id',200);
            $table->string('product_status',200);
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
        Schema::dropIfExists('list_products');
    }
}
