<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->string('cpf', 13)->unique('cpf');
            $table->string('email', 100)->unique('email');
            $table->string('password', 100);
            $table->date('birth_date');
            $table->integer('radgroupcheck_id')->default(1)->index('users_radgroupcheck_id_foreign');
            $table->boolean('admin')->default(0);
            $table->boolean('root')->default(0);
            $table->boolean('block')->default(0);
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
        Schema::dropIfExists('users');
    }
}
