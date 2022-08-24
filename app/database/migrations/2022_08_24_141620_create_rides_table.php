<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->double('lat_start');
            $table->double('lng_start');
            $table->double('lat_destination');
            $table->double('lng_destination');
            $table->dateTime('start_time', $precision = 0);
            $table->dateTime('end_time', $precision = 0);
            $table->enum('type', ['offer', 'request', 'match', 'finished']);
            $table->foreignId('user1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user2_id')->nullable()->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('rides');
    }
}
