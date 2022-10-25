<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bookingCode');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_tour_id')->constrained();
            $table->foreignId('product_tour_date_id')->constrained();
            $table->foreignId('visa_id')->nullable()->constrained();
            $table->integer('payment_status');
            $table->text('payment_url')->nullable();
            $table->string('title');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->string('email');
            $table->bigInteger('phoneNumber');
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
        Schema::dropIfExists('tour_bookings');
    }
}
