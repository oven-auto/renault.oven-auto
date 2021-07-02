<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMotor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motor_type_id')->constrained();
            $table->foreignId('motor_transmission_id')->constrained();
            $table->foreignId('motor_driver_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->string('name');
            $table->float('size')->nullable();
            $table->integer('power');
            $table->integer('valve')->nullable();
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
        Schema::dropIfExists('motors');
    }
}
