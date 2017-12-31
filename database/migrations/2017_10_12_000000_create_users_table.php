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
            $table->increments('id')->unsigned();
            $table->string('vid')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('status')->default(2)->unsigned();
            $table->integer('atc_rating_id')->default(2)->unsigned();
            $table->integer('pilot_rating_id')->default(2)->unsigned();
            $table->integer('isStaff')->default(0)->unsigned();
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
}
