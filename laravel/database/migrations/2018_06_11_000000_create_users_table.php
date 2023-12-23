<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username')->unique();;
            $table->string('email')->unique();
            $table->string('password', 64);
            $table->rememberToken(); // Remember me oken for logged in users.
            $table->timestamps();
            $table->softDeletes();
            $table->integer('role_id')->unsigned()->index()->default(3)->nullable();
        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');;
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
