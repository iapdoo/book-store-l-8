<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about__us', function (Blueprint $table) {
            $table->id();
            $table->string('siteName');
            $table->string('sitDescription');
            $table->string('sitImage');
            $table->string('facebook');
            $table->string('tweeter');
            $table->string('linkin');
            $table->integer('phone');
            $table->string('email');
            $table->string('address');
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
        Schema::dropIfExists('about__us');
    }
}
