<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_orders', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',200);
            $table->string('gender',200);
            $table->integer('phone');
            $table->string('email',200);
            $table->string('address',200);
            $table->string('city',200);
            $table->string('username',200);
            $table->string('password',200);
            $table->string('bill_detail',200);
            $table->string('pay',200);
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
        Schema::dropIfExists('list_orders');
    }
}
