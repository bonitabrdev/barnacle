<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeSomeCustomersColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->date('dob')->nullable()->default(null)->change();
            $table->string('first_name')->nullable()->change();
            $table->string('home_street')->nullable()->change();
            $table->string('home_city')->nullable()->change();
            $table->string('home_state')->nullable()->change();
            $table->string('home_zip')->nullable()->change();
            $table->string('local_street')->nullable()->change();
            $table->string('local_city')->nullable()->change();
            $table->string('local_state')->nullable()->change();
            $table->string('local_zip')->nullable()->change();
            $table->string('drivers_license')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->date('dob')->nullable(false)->default('2017-01-01')->change();
            $table->string('first_name')->nullable(false)->change();
            $table->string('home_street')->nullable(false)->change();
            $table->string('home_city')->nullable(false)->change();
            $table->string('home_state')->nullable(false)->change();
            $table->string('home_zip')->nullable(false)->change();
            $table->string('local_street')->nullable(false)->change();
            $table->string('local_city')->nullable(false)->change();
            $table->string('local_state')->nullable(false)->change();
            $table->string('local_zip')->nullable(false)->change();
            $table->string('drivers_license')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
        });
    }
}
