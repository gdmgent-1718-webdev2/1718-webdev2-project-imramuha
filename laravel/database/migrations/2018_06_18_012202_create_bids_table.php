<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->float('bid', 8, 2)->default(0.00)->nullable();
            $table->dateTimeTz('started_at')->nullable();
            $table->dateTimeTz('ended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('highest_bidder')->unsigned()->index()->nullable();
            $table->integer('seller_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('fish_id')->unsigned()->nullable();
            $table->json('bidders_id')->nullable();

            // $table->unique(['bidder_id', 'seller_id']);
        });

        Schema::table('bids', function($table) {
            $table->foreign('fish_id')->references('id')->on('fishes')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('bids', function($table) {
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('bids', function($table) {
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('bids', function($table) {
            $table->foreign('highest_bidder')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // might wanan drop cust_id...
        Schema::dropIfExists('bids');
    }
}
