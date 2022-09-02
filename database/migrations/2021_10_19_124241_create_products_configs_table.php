<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_configs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('invoice_prefix');
            $table->string('payment_due_time');
            $table->string('code');
            $table->boolean('show_search_engine')->default(0);
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
        Schema::dropIfExists('products_configs');
    }
}
