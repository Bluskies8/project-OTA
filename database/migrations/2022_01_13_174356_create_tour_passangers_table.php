<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPassangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_passangers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_bookings_id')->constrained();
            $table->string('room');
            $table->string('extrabed');
            $table->string('bedtype');
            $table->foreignId('customers_id')->constrained();
            $table->boolean('has_visa');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_passangers');
    }
}
