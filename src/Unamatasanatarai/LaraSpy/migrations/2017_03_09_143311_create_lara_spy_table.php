<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaraSpyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spy', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user')->unsigned()->index()->nullable();
            $table->string('subject')->nullable();
            $table->text('data')->nullable();
            $table->string('ip', 64)->nullable();
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
        Schema::drop('spy');
    }
}