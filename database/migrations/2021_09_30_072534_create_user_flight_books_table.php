<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFlightBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_flight_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id');
            $table->foreignId('airlines_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('booking_code')->nullable();
            $table->dateTime('book_date')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->bigInteger('nta');
            $table->bigInteger('clean_price');
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
        Schema::dropIfExists('user_flight_books');
    }
}
