<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCurrencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function ($table) {
            $table->timestamp('created_at');
        });
        Schema::table('currencies', function ($table) {
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function ($table) {
            $table->dropColumn('created_at');
        });
        Schema::table('currencies', function ($table) {
            $table->dropColumn('updated_at');
        });
    }
}
