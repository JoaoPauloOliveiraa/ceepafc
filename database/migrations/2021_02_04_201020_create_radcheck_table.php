<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadcheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radcheck', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique('user_id');
            $table->string('UserName', 64)->default('')->index('UserName');
            $table->string('Attribute', 32)->default('');
            $table->char('op', 2)->default('==');
            $table->string('Value', 253)->default('');
        });
    
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radcheck');
    }
}
