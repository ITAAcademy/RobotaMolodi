<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function(Blueprint $table){
            $table->string('short_name');
            $table->string('link');
            $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            $table->dropColumn('short_name');
            $table->dropColumn('link');
            $table->dropColumn('phone');
            $table->dropColumn('industry_id');
            $table->dropColumn('city_id');
        });
    }
}
