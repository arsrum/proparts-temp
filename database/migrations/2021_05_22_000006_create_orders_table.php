<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_no')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->integer('generic_article')->nullable();
            $table->integer('article_no')->nullable();
            $table->integer('brand_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
