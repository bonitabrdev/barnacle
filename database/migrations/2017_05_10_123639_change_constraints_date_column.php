<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeConstraintsDateColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('constraints', function (Blueprint $table) {
            $table->renameColumn('constrained_date', 'date');
            $table->unique('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('constraints', function (Blueprint $table) {
            $table->dropUnique('date');
            $table->renameColumn('date', 'constrained_date');
        });
    }
}
