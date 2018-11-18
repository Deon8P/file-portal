<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner_username');
            $table->string('last_uploader_username');
            $table->string('type');
            $table->string('name');
            $table->text('path');
            $table->bigInteger('byte_size');
            $table->boolean('shared');
            $table->boolean('global');
            $table->unsignedInteger('version');
            $table->timestamps();
        });

        Schema::table('files', function(Blueprint $table)
        {
            $table->foreign('owner_username')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('last_uploader_username')->references('username')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
