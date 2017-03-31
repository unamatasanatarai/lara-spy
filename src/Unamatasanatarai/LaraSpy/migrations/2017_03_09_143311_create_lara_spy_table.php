<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaraSpyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'spy',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user')->unsigned()->index()->nullable();
                $table->string('subject')->nullable();
                $table->string('target_name')->nullable();
                $table->bigInteger('target_id')->nullable()->unsigned();
                $table->text('data')->nullable();
                $table->string('ip', 64)->nullable();
                $table->timestamps();
            }
        );
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