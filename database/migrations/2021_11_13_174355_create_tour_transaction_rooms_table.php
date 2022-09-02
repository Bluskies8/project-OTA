<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourTransactionRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_transaction_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_transaction_id')->constrained();
            $table->string('name');
            $table->string('extrabed');
            $table->string('bedtype');
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
        Schema::dropIfExists('tour_transaction_rooms');
    }
}
