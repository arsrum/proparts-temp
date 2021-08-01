<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('vin_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
