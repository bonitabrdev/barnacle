<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatesAndTimesToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
            $table->date('reserved_date')->default('2017-01-01');
            $table->time('start')->default('00:00:00');
            $table->time('end')->default('00:00:00');
            $table->string('type')->default('40HP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
            $table->dropColumn('reserved_date');
            $table->dropColumn('start');
            $table->dropColumn('end');
            $table->dropColumn('type');
        });
    }
}
