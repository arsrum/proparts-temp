<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleDetailsProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('manu_id')->nullable();
            $table->string('model_id')->nullable();
            $table->string('type_id')->nullable();
            
            $table->string('manu_name')->nullable();
            $table->string('model_name')->nullable();
            $table->string('type_name')->nullable();

            $table->string('oe_number')->nullable();
            $table->string('oem_number')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
