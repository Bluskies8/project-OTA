<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFlightBookGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_flight_book_groups', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->foreignId('order_by');
            $table->dateTime('order_date');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->string('proof_payment')->nullable();
            $table->integer('book_status');
            $table->integer('payment_status');
            $table->string('payment_url')->nullable();
            $table->longText('ketentuan')->nullable();
            $table->bigInteger('total_price')->nullable();
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
        Schema::dropIfExists('user_flight_book_groups');
    }
}
