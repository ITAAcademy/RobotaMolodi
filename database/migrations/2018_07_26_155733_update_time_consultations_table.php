<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTimeConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('time_consultations', function (Blueprint $table)
        {
            $table->dropColumn('date');
            $table->dateTime('time_start')->nullable()->default(null)->change();
            $table->dateTime('time_end')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_consultations', function (Blueprint $table)
        {
            $table->string('date')->nullable()->default(null);
            $table->string('time_start')->nullable()->default(null);
            $table->string('time_end')->nullable()->default(null);
        });
    }

}
