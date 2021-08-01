<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_3973405')->references('id')->on('users');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id', 'address_fk_3973406')->references('id')->on('addresses');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_3973415')->references('id')->on('statuses');
        });
    }
}
