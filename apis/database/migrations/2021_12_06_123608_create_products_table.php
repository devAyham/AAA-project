<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('img');
            $table->integer('price');
            $table->integer('new_price');
            $table->integer('user_id');
            // $table->integer('user_phone');
            $table->integer('quantity');
            $table->integer('views');
            $table->string('category');
            $table->date('expiration_date');
            $table->string('contact_informations');
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
        Schema::dropIfExists('products');
    }
}
