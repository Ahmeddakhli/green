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
            $table->id();
            $table->string('product_name');
            $table->string('country');
            $table->string('img');
            $table->text('discription');
            $table->integer('price');
            $table->integer('discound')->default(false);
            $table->string('made_by');//الشركه المنتجة
            $table->string('categore');//الشركه القسم

            $table->integer('quantity');
            $table->bigInteger('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users')
        
                ->onDelete('cascade');
            
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
