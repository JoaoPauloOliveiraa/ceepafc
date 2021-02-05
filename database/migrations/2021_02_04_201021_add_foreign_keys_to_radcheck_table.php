<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRadcheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('radcheck', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('radcheck', function (Blueprint $table) {
            $table->dropForeign('fk_user_id');
        });
    }
}
