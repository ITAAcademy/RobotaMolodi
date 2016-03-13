<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyEmailField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function($table)
        {
            $table->string('email',255);
        });
        Schema::table('company', function($table)
        {
            $table->renameColumn('company_email', 'site');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function ($table) {
            $table->dropColumn('email');
        });
        Schema::table('company', function($table)
        {
            $table->renameColumn('site', 'company_email');
        });
    }
}
