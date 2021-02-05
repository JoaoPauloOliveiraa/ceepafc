<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_token', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('fk_id_user')->index('fk_id_user');
            $table->string('hash', 32)->nullable();
            $table->boolean('used')->nullable()->default(0);
            $table->dateTime('expired_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_token');
    }
}
