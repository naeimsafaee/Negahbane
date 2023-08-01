<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsToMonitorsTable extends Migration{

    public function up(){
        Schema::table('monitors', function(Blueprint $table){
            $table->boolean('need_redirect')->default(false)->after('is_locked');
            $table->boolean('need_ssl')->default(false)->after('need_redirect');
        });
    }

    public function down(){
        Schema::table('monitors', function(Blueprint $table){
            //
        });
    }
}
