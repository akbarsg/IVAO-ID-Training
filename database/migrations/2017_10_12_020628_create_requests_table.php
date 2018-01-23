<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('trainee_id')->unsigned();
            $table->string('email');
            $table->integer('type')->unsigned();
            $table->integer('atc_rating_id')->unsigned();
            $table->integer('pilot_rating_id')->unsigned();
            $table->dateTime('training_time');
            $table->string('note')->nullable();
            $table->integer('status')->default(0)->unsigned();
            $table->timestamps();

            $table->foreign('trainee_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('atc_rating_id')
                ->references('id')->on('atc_ratings')
                ->onDelete('cascade');
            $table->foreign('pilot_rating_id')
                ->references('id')->on('pilot_ratings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}