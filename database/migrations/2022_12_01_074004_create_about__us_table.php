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
            $table->string('siteName')->default('Book Store');
            $table->string('sitDescription')->default('Site Description');
            $table->string('sitImage')->default('image/image.jpg');
            $table->string('facebook')->default('facebook');
            $table->string('tweeter')->default('tweeter');
            $table->string('linkin')->default('linkin');
            $table->integer('phone')->default('01095370946');
            $table->string('email')->default('iprahimapdoo@gmail.com');
            $table->string('address')->default('embaba , giza');
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
