<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSingleFlightBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_single_flight_books', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->foreignId('order_by');
            $table->integer('book_status');
            $table->integer('payment_status');
            $table->string('transactionId');
            $table->string('city_route');
            $table->string('booking_code')->nullable();
            $table->dateTime('book_date');
            $table->dateTime('issue_date')->nullable();
            $table->text('payment_url')->nullable();
            $table->double('nta');
            $table->double('total');
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
        Schema::dropIfExists('user_single_flight_books');
    }
}
