<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_shift', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("movie_id");
            $table->unsignedBigInteger('shift_id');
            $table->timestamps();
            $table->softDeletes();
            
            // TODO: Uncomment this
            // $table->foreign('movie_id')->references('id')->on('movies');
            // $table->foreign('shift_id')->references('id')->on('shift');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies_shift');
    }
}
