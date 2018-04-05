<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('full_name');
            $table->string('part_name');
            $table->string('html_url');
            $table->longText('description')->nullable();
            $table->string('stargazers_count')->nullable();
            $table->string('language')->nullable();
            $table->string('license')->nullable();
            $table->string('owner_url');
            $table->string('owner_name');
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
        Schema::dropIfExists('star');
    }
}
