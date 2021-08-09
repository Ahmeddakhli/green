<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('username', 30);
            $table->text('addres_detailes');
            $table->string('email',50);
            $table->string('country_code',3);
            $table->string('phone_number',15);
            $table->Integer('number');
            $table->string('country');
            $table->string('city');
            $table->tinyInteger('status')->default(false);
            $table->bigInteger('product_id')->unsigned();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
