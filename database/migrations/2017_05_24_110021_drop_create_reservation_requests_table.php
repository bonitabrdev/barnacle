<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCreateReservationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('create_reservation_requests');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('create_reservation_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('num_people');
            $table->decimal('total_price', 5, 2);
            $table->date('reserved_date');
            $table->time('start');
            $table->time('end');
            $table->string('type');
            $table->boolean('processed')->default(false);
            $table->unsignedInteger('reservation_id')->nullable();
        });
    }
}
