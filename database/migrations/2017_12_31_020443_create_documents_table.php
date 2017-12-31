<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->integer('atc_rating_id')->unsigned();
            $table->integer('pilot_rating_id')->unsigned();
            $table->string('link');
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
        Schema::dropIfExists('documents');
    }
}