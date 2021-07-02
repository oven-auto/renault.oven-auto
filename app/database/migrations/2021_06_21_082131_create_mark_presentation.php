<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkPresentation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_presentations', function (Blueprint $table) {
            $table->foreignId('mark_id')->constrained()->onDelete('cascade');
            $table->string('icon');
            $table->string('banner');
            $table->string('slogan');
            $table->text('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_presentations');
    }
}
