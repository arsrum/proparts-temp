<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactusesTable extends Migration
{
    public function up()
    {
        Schema::create('contactuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('title')->nullable();
            $table->string('message')->nullable();
            $table->boolean('done')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
