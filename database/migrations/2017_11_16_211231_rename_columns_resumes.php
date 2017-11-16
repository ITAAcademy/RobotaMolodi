<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsResumes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function ($table) {
            $table->renameColumn('user_id', 'user_id');
            $table->renameColumn('city', 'city_id');
            $table->renameColumn('industry', 'industry_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resumes', function ($table) {
            $table->renameColumn('user_id', 'user_id');
            $table->renameColumn('city_id', 'city');
            $table->renameColumn('industry_id', 'industry');
        });
    }
}
