<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->integer('price')->unsigned();
            $table->enum('state' , ["free" , "buy" , "call"])->default("free");
            $table->integer('sms')->unsigned();
            $table->integer('email')->unsigned();
            $table->integer('website')->unsigned();
            $table->string('image')->nullable();
            $table->integer('period')->nullable();
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
        Schema::dropIfExists('licences');
    }
}
