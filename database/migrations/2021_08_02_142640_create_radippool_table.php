<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadippoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radippool', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pool_name', 30);
            $table->string('framedipaddress', 15)->default('')->index('framedipaddress');
            $table->string('nasipaddress', 15)->default('');
            $table->string('calledstationid', 30);
            $table->string('callingstationid', 30);
            $table->dateTime('expiry_time')->nullable();
            $table->string('username', 64)->default('');
            $table->string('pool_key', 30);
            $table->index(['pool_name', 'expiry_time'], 'radippool_poolname_expire');
            $table->index(['nasipaddress', 'pool_key', 'framedipaddress'], 'radippool_nasip_poolkey_ipaddress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radippool');
    }
}
