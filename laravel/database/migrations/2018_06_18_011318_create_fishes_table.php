<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('size');
            $table->string('detail');
            $table->date('birthdate');
            $table->char('sex');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable()->unsigned();
            $table->integer('user_id')->unsigned()->index()->nullable();

        });

        Schema::table('fishes', function($table) {
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade')->onUpdate('cascade');;
        });

        Schema::table('fishes', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
        });

        DB::statement("ALTER TABLE fishes ADD image LONGBLOB");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fishes');      
    }
}
