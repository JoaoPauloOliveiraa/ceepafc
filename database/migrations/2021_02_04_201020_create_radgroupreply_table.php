<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadgroupreplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radgroupreply', function (Blueprint $table) {
            $table->increments('id');
            $table->string('GroupName', 64)->default('')->index('GroupName');
            $table->string('Attribute', 32)->default('');
            $table->char('op', 2)->default('=');
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
        Schema::dropIfExists('radgroupreply');
    }
}
