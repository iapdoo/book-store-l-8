<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_subject');
            $table->text('contact_massage');
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->on('users')->references('id')->onDelete('cascade');
            $table->boolean('view')->default(false);
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
        Schema::dropIfExists('contacts');
    }
}
