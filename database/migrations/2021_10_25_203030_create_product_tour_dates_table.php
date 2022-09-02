    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTourDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tour_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->bigInteger('adult_twin_share_price');
            $table->bigInteger('single_suplement_price');
            $table->bigInteger('child_with_bed_price');
            $table->bigInteger('child_no_bed_price');
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
        Schema::dropIfExists('product_tour_dates');
    }
}
