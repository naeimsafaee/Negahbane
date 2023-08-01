<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitorsTable extends Migration{

    public function up(){
        Schema::create('monitors', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('destination');
            $table->string('port')->nullable();
            $table->integer('type')->default(0);
            $table->unsignedBigInteger('client_id');
            $table->string('link')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_locked')->default(false);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('monitors');
    }
}
