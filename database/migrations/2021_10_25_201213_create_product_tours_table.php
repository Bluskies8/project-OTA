<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained();
            $table->string('slug');
            $table->string('name');
            $table->text('header_img_url')->nullable();
            $table->text('thumbnail_img_url')->nullable();
            $table->bigInteger('start_price');
            $table->bigInteger('gimmic_price');
            $table->bigInteger('downpayment');
            $table->integer('pass_minim')->default(5);
            $table->integer('pass_limit');
            $table->integer('days_count');
            $table->integer('nights_count');
            $table->boolean('is_domestic')->default(1);
            $table->boolean('include_hotel')->default(1);
            $table->boolean('include_flight')->default(1);
            $table->boolean('include_ride')->default(1);
            $table->boolean('include_ticket')->default(1);
            $table->boolean('include_boat')->default(1);
            $table->boolean('include_guide')->default(1);
            $table->boolean('include_visa')->default(1);
            $table->dateTime('valid_date_start')->nullable();
            $table->dateTime('valid_date_end')->nullable();
            $table->text('description')->nullable();
            $table->integer('type')->default(0);
            $table->longText('keyword');
            $table->string('tags')->nullable();
            $table->string('countrytag')->nullable();
            $table->boolean('enabled')->default(0);
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
        Schema::dropIfExists('product_tours');
    }
}
